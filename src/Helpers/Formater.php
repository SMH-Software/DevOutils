<?php

namespace DevOutils\Helpers;
use Carbon\Carbon;

class Formater
{
     /**
        *
        * Formater une date selon le fuseau horaire et la langue locale spécifiés.
        *
        * Formats disponibles :
        * - d/m/Y (Ex: 19/07/2025)
        * - Y/m/d (Ex: 2025/07/19)
        *
        * @param string $date La date à formater 
        * @param string $locale La langue locale
        * @param string $timezome La region
        * @return string
    */
    public static function NormalDateFormat(string $date, string $locale = 'fr', string $timezone = 'Africa/Abidjan'): string
    {
        $format = $locale === 'fr' ? 'd/m/Y':'Y/m/d';

        return Carbon::parse($date)->setTimezone($timezone)->locale($locale)->format($format); 
    }

    /**
        *
        * Formater une date selon le format, le fuseau horaire et la langue locale spécifiés.
        *
        * Formats disponibles :
        * - dddd D MMMM YYYY (Ex: Samedi 19 Juillet 2025)
        * - D MMMM YYYY      (Ex: 19 Juillet 2025)
        *
        * @param string $date     La date à formater (ex: "2025-07-19")
        * @param string $timezone Le fuseau horaire (ex: "Africa/Abidjan")
        * @param string $locale   La langue locale (ex: "fr")
        * @param string $format   Le format de date (ex: "dddd D MMMM YYYY")
        * @return string
    */
    public static function FullDateFormat(string $date, string $format = 'dddd D MMMM YYYY', string $timezone = 'Africa/Abidjan', string $locale = 'fr'): string
    {
        return Carbon::parse($date) ->setTimezone($timezone)->locale($locale)->isoFormat($format);
    }

    /**
        *
        * Formaterb une date au format : il y a 1 minute
        *
        * @param string $date La date à formater
        * @param string $timezome La région
        * @param string $locale La langue locale
        * @return string
    */
    public static function RelativeDateFormat(string $date, string $timezone = 'Africa/Abidjan', string $locale = 'fr'): string
    {
        return Carbon::parse($date)->setTimezone($timezone)->locale($locale)->diffForHumans(); // ← Clé ici
    }

    /**
        *
        * Formate une heure en fonction du format souhaité
        * 
        * @param string $time L'heure à formater (ex: '19:20:45')
        * @param string $format Le format d'affichage (ex: 'H:i:s', 'H:i', 'H')
        * @param string $timezone Le fuseau horaire (par défaut 'Africa/Abidjan')
        * @param string $locale La langue locale (par défaut 'fr')
        * @return string L'heure formatée
    */
    public static function TimeFormat(string $time, string $format = 'H:i:s', string $timezone ='Africa/Abidjan', string $locale = 'fr'): string {
        return Carbon::parse($time)->setTimezone($timezone)->locale($locale)->format($format); // Si tu veux les noms localisés
    }

    /**
        *
        * Formate les montants numériques en une représentation lisible avec une devise
        *
        * @param float $amount Le montant à formater
        * @param int $decimal Le nombre de caractères decimaux
        * @param string $currency La dévise du montant à formater
        * @return string Retourne un montant formaté avec une séparation des milliers et une devise
    */
    public static function AmountFormat(float $amount, int $decimal = 0, ? string $currency = null): string
    {
        if(isset($currency)){
            if($currency === '$' || $currency === '€' || $currency === '£' || $currency === '¥' ){
                return $currency.number_format($amount, $decimal, ',', '.');
            }

            return number_format($amount, $decimal, ',', '.').' '.$currency;
        }

        return number_format($amount, $decimal, ',', '.');
    }

    
}