<?php


class Validate
{
    private $passed = false, $errors = [], $db = null;

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    public function check($source, $items = [])
    {
        foreach ($items as $item => $rules) {

            foreach ($rules as $rule => $rule_value) {

                $value = $source[$item];

                if ($rule == 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} должно быть минимум {$rule_value} символов!");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} должно быть меньше {$rule_value} символов!");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} должно быть заполнено {$item}");
                            }
                            break;
                        case 'unique':
                            $chek = $this->db->get($rule_value, [$item, '=', $value]);
                            if ($chek->getCount()) {
                                $this->addError("{$item} должно быть уникальным");
                            }
                            break;
                    }
                }
            }
        }

        if (empty($this->errors)){
            $this->passed = true;
        }
        return $this;
    }

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function passed()
    {
        return $this->passed;
    }
}