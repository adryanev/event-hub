<?php

namespace admin\controllers;
use yii\web\Controller;

class VerifikasiOrganizerController extends Controller
{
    public function behaviors(){

        return[
            'verbs'=>[
                'class'=> VerbFilter::class,
                'actions'=>[
                    'delete'=>['POST']
                ]
            ]
        ];
    }
}