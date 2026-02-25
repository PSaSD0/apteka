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

    'accepted' => 'Вы должны принять :attribute.',
    'accepted_if' => 'Вы должны принять :attribute когда :other соответствует :value.',
    'active_url' => 'Поле :attribute не действительный URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'Поле :attribute должно быть датой перед :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой перед или равной :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла :attribute должен быть от :min до :max килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть от :min до :max.',
        'array' => 'Количество элементов в поле :attribute должно быть от :min до :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'current_password' => 'Пароль неверен.',
    'date' => 'Поле :attribute не является датой.',
    'date_equals' => 'Поле :attribute должно быть датой равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'declined' => 'Поле :attribute должно быть отклонено.',
    'declined_if' => 'Поле :attribute должно быть отклонено когда :other равно :value.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина поля :attribute должна быть :digits символов.',
    'digits_between' => 'Длина поля :attribute должна быть между :min и :max символов.',
    'dimensions' => 'Изображение :attribute имеет недопустимые размеры.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values.',
    'enum' => 'Выбранное значение для :attribute некорректно.',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно должно иметь значение.',
    'gt' => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file' => 'Размер файла :attribute должен быть больше :value килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть больше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'file' => 'Размер файла :attribute должен быть больше или равен :value килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть больше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше или равно :value.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'lt' => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file' => 'Размер файла :attribute должен быть меньше :value килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть меньше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'file' => 'Размер файла :attribute должен быть меньше или равен :value килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше или равно :value.',
    ],
    'mac_address' => 'Поле :attribute должно быть действительным MAC-адресом.',
    'max' => [
        'numeric' => 'Поле :attribute не может быть больше :max.',
        'file' => 'Размер файла :attribute не может быть больше :max килобайт.',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не меньше :min.',
        'file' => 'Размер файла :attribute должен быть не меньше :min килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть не меньше :min.',
        'array' => 'Количество элементов в поле :attribute должно быть не меньше :min.',
    ],
    'multiple_of' => 'Поле :attribute должно быть кратным :value.',
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'not_regex' => 'Поле :attribute имеет неправильный формат.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'Поле :attribute должно присутствовать.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если :other не входит в :values.',
    'prohibits' => 'Поле :attribute запрещает присутствие :other.',
    'regex' => 'Поле :attribute имеет неправильный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указаны.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значения полей :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть :size.',
        'file' => 'Размер файла :attribute должен быть :size килобайт.',
        'string' => 'Количество символов в поле :attribute должно быть :size.',
        'array' => 'Количество элементов в поле :attribute должно быть :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка файла :attribute не удалась.',
    'url' => 'Поле :attribute должно быть действительным URL.',
    'uuid' => 'Поле :attribute должно быть действительным UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
