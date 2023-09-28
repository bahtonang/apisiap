<?php
namespace App\Controllers;

use App\Models\ModelSatu;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Otentikasi extends BaseController
{
    /**
     * Authenticate Existing User
     * @return Response
     */
    public function login()
    {
        $throttler = \Config\Services::throttler();
        $allowed = $throttler->check('login', 4, MINUTE);
        if ($allowed) {

            $rules = [
                'pid' => 'required',
                'pass' => 'required',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Invalid login credentials provided',
                ],
            ];

            $input = $this->getRequestInput($this->request);

            if (!$this->validateRequest($input, $rules, $errors)) {
                return $this
                    ->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            }

            return $this->getJWTForUser($input['pid'], $input['pass']);

        } else {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => 'Too many hits to server. please try after some time',

                    ]
                );            
        }

    }

    private function getJWTForUser(string $pid, string $pass, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {

            $model = new ModelSatu();
            $user = $model->loginModel($pid, $pass);
            if ($user) {
                helper('jwt');

                return $this
                    ->getResponse(
                        [
                            'error' => false,
                            'message' => 'User authenticated successfully',
                            'user' => $user,
                            'access_token' => getSignedJWTForUser($pid),
                        ]
                    );
            }      
         //   return $this->response->setStatusCode(404);      

            return $this
          ->getResponse(
               [
                   'message' => 'Invalid User',
                   'error' => true,                    
                ]
           )->setStatusCode(404);

        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
}
