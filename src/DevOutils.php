<?php
namespace DevOutils;

use DevOutils\Helpers\CodeGenerator;
use DevOutils\Helpers\Formater;

class DevOutils
{
    /**
        *Constructeur
    */
    public function __construct()
    {
        //
    }
   
    /**
        *Générer un code numérique ou alphanumérique(avec un préfix) unique
    */
    public static function CodeGenerator(): CodeGenerator
    {
        return new CodeGenerator();
    }

    /**
        *Formater une date ou un montant selon le format souhaité
    */
    public static function Formater():Formater
    {
        return new Formater();
    }
}