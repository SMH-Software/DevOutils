<?php

namespace DevOutils\Helpers;

class CodeGenerator
{
    /**
        *
        * Générer un code numérique unique
        *
        * @param string $code Le code
        * @return string
    */
    public static function codenumber(string $code): string
    {
        $code = intval($code);
        if($code < 10){
        //1
        $code += 1;
            return '0000'.$code;
        }elseif($code < 100){
            //2
            $code += 1;
            return '000'.$code;
        }elseif($code < 1000){
            //3
            $code += 1;
            return '00'.$code;
        }elseif($code < 10000){
            //4
            $code += 1;
            return '0'.$code;
        }elseif($code < 100000){
            //5
            $code += 1;
            return $code;
        }else{
            return 'Limite atteinte !';
        }
    }

    /**
        *
        * Générer un code alphanumérique précédé d’un préfixe personnalisé
        *   
        * @param string $code Le code
        * @param string $chaine Chaine à partir de laquelle le prefix est obtenu
        * @param int $value La valeur spécifiant le nombre de caractères à obtenir dans le prefix definie à 3 par defaut
        * @return string
    */
    public static function codeWithPrefix(string $code, string $chaine, int $value = 1): string {
        $code = self::splitCode($code);
        $codePrefix = $code['prefix'] === '-' ? (self::getPrefix($chaine, $value)."-"):$code['prefix'].'-';
        $codeNumber = intval($code['number']);

        if($codeNumber === 0){
            return self::getPrefix($chaine, $value).'-'.'0000'.($codeNumber += 1);
        }

        if($codeNumber >= 1 || $codeNumber < 10){
            //1
            return  $codePrefix.'0000'.($codeNumber + 1);
        }elseif($codeNumber < 100){
            //2
            return  $codePrefix.'000'.($codeNumber + 1);
        }elseif($codeNumber < 1000){
            //3
            return  $codePrefix.'00'.($codeNumber + 1);
        }elseif($codeNumber < 10000){
            //4
            return  $codePrefix.'0'.($codeNumber + 1);
        }elseif($codeNumber < 100000){
            //5
            return  $codePrefix.($codeNumber + 1);
        }else{
            return 'Limite atteinte !';
        }
    }

    /**
        *
        * Obtenir le prefix d'une chaine de caractère selon le nombre de caractères souhaité
        *
        * @param string $chaine La chaine dont on veut obtenir le prefix
        * @param int $value La valeur spécifiant le nombre de caractères à obtenir dans le prefix
        * @return string
    */
    private static function getPrefix(string $chaine, int $value): string{
       
        if(!is_string($chaine)){
            return 'Chaine invalide';
        }

        $chaine = str_split($chaine);
        $prefix = '';

        for($i=0; $i < count($chaine); $i++){
            if($i < $value){
                $prefix .= $chaine[$i];
            }
        }

        return $prefix;
    }

    /**
        *
        * Spliter(Séparer) une chaine de caractères
        *
        * @param string $chaine La chaine à spliter. Ex : FAC-00001
        * @return array
    */
    private static function splitCode(string $chaine): array{
        $chaine = str_split($chaine);
        $prefix = '';
        $number = '';
        $alphabet = range('A', 'Z');
       
        foreach($chaine as $char){
            if(in_array($char, $alphabet) || $char === '-'){
                $prefix .= $char;
            }else{
                $number .= $char;
            }
        }

        return [
            'prefix' => $prefix,
            'number' => $number 
        ];
    }

}