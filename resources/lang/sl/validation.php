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

    'accepted'             => 'Atribut :attribute mora biti označen.',
    'active_url'           => 'Atribut :attribute ni veljaven spletni naslov.',
    'after'                => 'Atribut :attribute mora biti datum po :date.',
    'alpha'                => 'Atribut :attribute mora vsebovati le črke.',
    'alpha_dash'           => 'Atribut :attribute lahko vsebuje le črke, števila in vezaje.',
    'alpha_num'            => 'Atribut :attribute lahko vsebuje je alfanumerične znake.',
    'array'                => 'Atribut :attribute mora biti polje (array).',
    'before'               => 'Atribut :attribute mora biti datum pred :date.',
    'between'              => [
        'numeric' => 'Atribut :attribute mora biti v rangu med :min in :max.',
        'file'    => 'Atribut :attribute mora biti v rangu med :min in :max KB.',
        'string'  => 'Atribut :attribute mora vsebovati med :min in :max znakov.',
        'array'   => 'Atribut :attribute mora imeti med :min in :max elementov.',
    ],
    'boolean'              => 'Polje :attribute mora biti pravilno ali napačno (true ali false).',
    'confirmed'            => 'Atribut :attribute ni potrjen.',
    'date'                 => 'Atribut :attribute ni veljaven datum.',
    'date_format'          => 'Atribut :attribute ne ustreza formatu :format.',
    'different'            => 'Atributa :attribute in :other morata imeti različni vrednosti.',
    'digits'               => 'Atribut :attribute mora imeti :digits števk.',
    'digits_between'       => 'Atribut :attribute lahko vsebuje le :min do :max števk.',
    'email'                => 'Atribut :attribute mora biti veljaven elektronski naslov.',
    'exists'               => 'Izbran atribut :attribute je neveljaven.',
    'filled'               => 'Polje :atribute je obvezno.',
    'image'                => 'Atribut :attribute mora biti veljavnega slikovnega formata.',
    'in'                   => 'Izbran atribut :attribute ni veljaven.',
    'integer'              => 'Atribut :attribute mora biti celo število.',
    'ip'                   => 'Atribut :attribute mora biti veljaven IP naslov.',
    'json'                 => 'Atribut :attribute mora biti formatiran v JSON formatu.',
    'max'                  => [
        'numeric' => 'Atribut :attribute ne sme biti večji od :max.',
        'file'    => 'Atribut :attribute ne sme biti večji od :max KB.',
        'string'  => 'Atribut :attribute ne sme imeti več kot :max znakov.',
        'array'   => 'Atribut :attribute ne sme imeti več kot :max elementov.',
    ],
    'mimes'                => 'Atribut :attribute mora biti datoteka tipa :values.',
    'min'                  => [
        'numeric' => 'Atribut :attribute mora biti vsaj :min.',
        'file'    => 'Atribut :attribute mora biti velik vsaj :min KB.',
        'string'  => 'Atribut :attribute mora biti dolg vsaj :min znakov.',
        'array'   => 'Atribut :attribute mora vsebovati vsaj :min elementov.',
    ],
    'not_in'               => 'Izbran atribut :attribute ni veljaven.',
    'numeric'              => 'Atribut :attribute mora biti število.',
    'regex'                => 'Format atributa :attribute ni veljaven.',
    'required'             => 'Polje :attribute je obvezno.',
    'required_if'          => 'Polje :attribute je obvezno, če atribut :other zavzema vrednost :value.',
    'required_with'        => 'Polje :attribute je obvezno ob prisotnosti vrednosti :values.',
    'required_with_all'    => 'Polje :attribute je obvezno ob prisotnosti vrednosti :values.',
    'required_without'     => 'Polje :attribute je obvezno v primeru, ko vrednost :values ni prisotna.',
    'required_without_all' => 'Polje :attribute je obvezno, ko nobena od vrednosti :values ni prisotna.',
    'same'                 => 'Atributa :attribute in :other se morata ujemati.',
    'size'                 => [
        'numeric' => 'Atribut :attribute mora biti :size.',
        'file'    => 'Atribut :attribute mora biti velikosti :size KB.',
        'string'  => 'Atribut :attribute mora vsebovati :size znakov.',
        'array'   => 'Atribut :attribute mora vsebovati :size elementov.',
    ],
    'string'               => 'Atribut :attribute mora biti znakovni niz.',
    'timezone'             => 'Atribut :attribute mora biti veljaven časovni pas.',
    'unique'               => 'Atribut :attribute je že zaseden.',
    'url'                  => 'Atribut :attribute je napačnega formata.',

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
