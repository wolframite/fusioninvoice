<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute doit être accepté.',
    'active_url'           => ':attribute n\'est pas une URL valide.',
    'after'                => ':attribute doit être une date postérieure à :date.',
    'after_or_equal'       => ':attribute doit être une date postérieure ou égale à :date.',
    'alpha'                => ':attribute doit contenir uniquement des caractères alphabétiques.',
    'alpha_dash'           => ':attribute doit contenir uniquement des lettres, des chiffres, et des symboles dièses.',
    'alpha_num'            => ':attribute doit contenir uniquement des lettres et des chiffres.',
    'array'                => ':attribute doit être un tableau.',
    'before'               => ':attribute doit être une date antérieure à :date.',
    'before_or_equal'      => ':attribute doit être une date antérieure ou égale à :date.',
    'between'              => [
        'numeric' => ':attribute doit être compris entre :min et :max.',
        'file'    => ':attribute doit être compris entre :min et :max kilobits.',
        'string'  => ':attribute doit contenir :min à :max caractères.',
        'array'   => ':attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean'              => ':attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ de confirmation :attribute ne correspond pas à la saisie.',
    'date'                 => ':attribute n\'est pas une date valide.',
    'date_format'          => ':attribute ne satisfait pas le format :format.',
    'different'            => ':attribute et :other doivent être différents.',
    'digits'               => ':attribute doit contenir :digits chiffres.',
    'digits_between'       => ':attribute doit être compris entre :min et :max chiffres.',
    'dimensions'           => 'L\'image :attribute ne possède pas des dimensions valides.',
    'distinct'             => 'Le champ :attribute possède une valeur en double.',
    'email'                => ':attribute doit être une adresse email valide.',
    'exists'               => 'L\'attribut sélectionné :attribute n\'est pas valide.',
    'file'                 => ':attribute doit être un fichier.',
    'filled'               => ':attribute doit être renseigné.',
    'image'                => ':attribute doit contenir une image.',
    'in'                   => 'L\'attribut sélectionné :attribute n\'est pas valide.',
    'in_array'             => ':attribute n\'existe pas dans :other.',
    'integer'              => ':attribute doit être un nombre entier.',
    'ip'                   => ':attribute doit être une adresse IP valide.',
    'ipv4'                 => ':attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => ':attribute doit être une adresse IPv6 valide.',
    'json'                 => ':attribute doit être une chaîne de caractères JSON valide.',
    'max'                  => [
        'numeric' => ':attribute doit être supérieur à :max.',
        'file'    => ':attribute doit être supérieur à :max kilobits.',
        'string'  => ':attribute doit être supérieur à :max caractères.',
        'array'   => ':attribute doit contenir moins de :max éléments.',
    ],
    'mimes'                => ':attribute doit être un fichier de type : :values.',
    'mimetypes'            => ':attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => ':attribute doit être d\'au moins :min.',
        'file'    => ':attribute doit être d\'au moins :min kilobits.',
        'string'  => ':attribute doit être d\'au moins :min caractères.',
        'array'   => ':attribute doit être d\'au moins :min éléments.',
    ],
    'not_in'               => 'Le champ sélectionné :attribute est invalide.',
    'numeric'              => ':attribute doit être un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with'        => 'Le champ :attribute est obligatoire lorsque :values est présent.',
    'required_with_all'    => 'Le champ :attribute est obligatoire lorsque :values est présent.',
    'required_without'     => 'Le champ :attribute est obligatoire lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque aucun des :values n\'est présent.',
    'same'                 => 'Les champs :attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => ':attribute doit être :size.',
        'file'    => ':attribute doit être :size kilobits.',
        'string'  => ':attribute doit être de :size caractères.',
        'array'   => ':attribute doit contenir :size éléments.',
    ],
    'string'               => ':attribute doit être une chaine de texte.',
    'timezone'             => ':attribute doit être un fuseau horaire valide.',
    'unique'               => ':attribute est déjà utilisé.',
    'uploaded'             => 'L\'upload de :attribute a échoué.',
    'url'                  => 'Le format :attribute est invalide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
