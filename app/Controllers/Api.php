<?php

namespace App\Controllers;
use App\Models\ModelDua;
use App\Models\ModelSatu;
use App\Models\ModelTiga;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Api extends BaseController
{

    public function getVersi()
    {
        try {

            $model = new ModelSatu();
            $versi = $model->versi();

            if ($versi) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $versi,
                    ]
                );

            } else {
                return $this->response->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find versi',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

    public function updatePassword()
    {
        $pid = $this->request->getVar('pid');
        $pass = $this->request->getVar('pass');
        $ibu = $this->request->getVar('ibu');

        try {

            $rules = [
                'pid' => 'required',
                'ibu' => 'required',
                'pass' => 'required',
            ];

            $errors = [
                'pid' => [
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
            } else {

                $model = new ModelSatu();
                $update = $model->updatepass($pid, $ibu, $pass);
                if ($update>0) {
                    return $this
                        ->getResponse(
                            [
				'error' => false,
                                'message' => 'Success',
                            ]
                        );

                } else {
                    return $this
                        ->getResponse(
                            [
				'error' => true,
                                'message' => 'error',
                            ]
                        );
                }
            }
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],

                );
        }
    }

    public function getAbsen($pid, $tahun)
    {
        try {

            $model = new ModelSatu();
            $data = $model->absen($pid, $tahun);

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->response->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find absen',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

   public function getTeknisi($gedung,$kodebagian)
  {
    try {

        $model = new ModelSatu();
        $data = $model->teknisi($gedung, $kodebagian);

        if ($data) {

            return $this->getResponse(
                [
                    'status' => 'success',
                    'data' => $data,
                ]
            );

        } else {
            return $this->response->setStatusCode(404);
        }
    } catch (Exception $e) {
        return $this->getResponse(
            [
                'status' => 'error',
                'message' => 'Could not find Teknisi',
            ],
            ResponseInterface::HTTP_NOT_FOUND
        );
    }

  }

  public function getLokasi($gedung)
  {
    try {

        $model = new ModelSatu();
        $data = $model->lokasi($gedung);

        if ($data) {

            return $this->getResponse(
                [
                    'status' => 'success',
                    'data' => $data,
                ]
            );

        } else {
            return $this->response->setStatusCode(404);
        }
    } catch (Exception $e) {
        return $this->getResponse(
            [
                'status' => 'error',
                'message' => 'Could not find Lokasi',
            ],
            ResponseInterface::HTTP_NOT_FOUND
        );
    }

  }

  public function kirimtiket()
    {
        $kodebarang = $this->request->getVar('kodebarang');
        $namabarang = $this->request->getVar('namabarang');
        $keluhan = $this->request->getVar('keluhan');
        $lokasi = $this->request->getVar('lokasi');
        $pengirim = $this->request->getVar('pengirim');
        $teknisi = $this->request->getVar('teknisi');
        $kodebagian = $this->request->getVar('kodebagian');

        try {

            $rules = [
                'namabarang' => 'required',
                'keluhan' => 'required',
                
            ];

            $errors = [
                'keluhan' => [
                    'validateUser' => 'Keluhan credentials provided',
                ],
            ];

            $input = $this->getRequestInput($this->request);

            if (!$this->validateRequest($input, $rules, $errors)) {
                return $this
                    ->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            } else {

                $model = new ModelSatu();
                $update = $model->kirimtiket($kodebarang,$namabarang,$keluhan,$lokasi,$pengirim,$teknisi,$kodebagian);
                if ($update) {
                    return $this
                        ->getResponse(
                            [
                                'message' => 'Success',
                            ]
                        );

                } else {
                    return $this
                        ->getResponse(
                            [
                                'message' => 'error',
                            ]
                        );
                }
            }
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],

                );
        }
    }

    public function getTcard($pid, $bulan, $tahun)
    {
        try {

            $model = new ModelTiga();
            $client = $model->tcardModel($pid, $bulan, $tahun);

            if ($client) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $client,
                    ]
                );

            } else {
                //   return $this->response->setStatusCode(404);
                return $this->getResponse(['error' => true, 'message' => 'Could not find Timecard'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find timecard',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function getInfo()
    {
        try {

            $model = new ModelSatu();
            $data = $model->info();

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Info'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find info',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function getInfostaf()
    {
        try {

            $model = new ModelDua();
            $data = $model->infostaf();

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Info'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find info',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

    public function getGajiop($pid, $kodepr)
    {
        try {

            $model = new ModelSatu();
            $data = $model->gajiop($pid, $kodepr);

            if ($data["kodepr"]!=null) {
                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Gaji'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find gajiop',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

    public function getSaran($pid)
    {
        try {

            $model = new ModelSatu();
            $data = $model->saran($pid);

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Saran'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find info',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

    public function kirimSaran()
    {
        $pid = $this->request->getVar('pid');
        $isi = $this->request->getVar('isi');

        try {

            $rules = [
                'pid' => 'required',
                'isi' => 'required',
            ];

            $errors = [
                'pid' => [
                    'validateUser' => 'Invalid Pid credentials provided',
                ],
            ];

            $input = $this->getRequestInput($this->request);

            if (!$this->validateRequest($input, $rules, $errors)) {
                return $this
                    ->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            } else {

                $model = new ModelSatu();
                $update = $model->kirimsaran($pid, $isi);
                if ($update) {
                    return $this
                        ->getResponse(
                            [
                                'message' => 'Success',
                            ]
                        );

                } else {
                    return $this
                        ->getResponse(
                            [
                                'message' => 'error',
                            ]
                        );
                }
            }
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],

                );
        }
    }

    public function getCutistaf($pid)
    {
        try {

            $model = new ModelSatu();
            $data = $model->cutistaf($pid);

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Cuti'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find Cuti',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function getGajistaf($pid, $token, $kodepr)
    {
        try {

            $model = new ModelDua();
            $data = $model->gajistaf($pid, $token, $kodepr);

            if ($data) {

                return $this->getResponse(
                    [
                        'status' => 'success',
                        'data' => $data,
                    ]
                );

            } else {
                return $this->getResponse(['error' => true, 'message' => 'Could not find Gaji'])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'status' => 'error',
                    'message' => 'Could not find gajistaf',
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }

    }

      public function absenMasuk()

      {
        $pid = $this->request->getVar('pid');

        try {

            $rules = [
                'pid' => 'required',
            ];

            $errors = [
                'pid' => [
                    'validateUser' => 'Invalid Pid credentials provided',
                ],
            ];

            $input = $this->getRequestInput($this->request);

            if (!$this->validateRequest($input, $rules, $errors)) {
                return $this
                    ->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            } else {

 		$model = new ModelTiga();
                $update = $model->cekin($pid);
                return $this->getResponse(['message'=>$update,'error'=>false]);

            }
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],

                );
        }
    }


    public function absenPulang()
    {
        $pid = $this->request->getVar('pid');

        try {

            $rules = [
                'pid' => 'required',
            ];

            $errors = [
                'pid' => [
                    'validateUser' => 'Invalid Pid credentials provided',
                ],
            ];

            $input = $this->getRequestInput($this->request);

            if (!$this->validateRequest($input, $rules, $errors)) {
                return $this
                    ->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            } else {

                $model = new ModelTiga();
                $update = $model->cekout($pid);
		return $this->getResponse(['message'=>$update,'error'=>false]);
           }
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => true,
                        'message' => $exception->getMessage(),
                    ],

                );
        }
    }

}
