<?php

namespace DexterService\Models;

abstract class AbstractEntity
{

    /**
     * Já constrói uma entidade com os valores das propriedades automaticamente via seus setters
     */
    final public function __construct(array $fields = array())
    {
        foreach ($fields as $field => $value) {
            if (!$value) {
                continue;
            }

            $setter = $this->generateSetter($field);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    /**
     * Recebe meu_campo e retorna setMeuCampo
     */
    private function generateSetter($field)
    {
        return 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $field)));
    }

    public function toArray()
    {
        $return = array();
        foreach ((new \ReflectionObject($this))->getProperties() as $property) {
            $name = $property->getName();
            if (strtolower(substr($name, -2)) === 'id') {
                $name = 'id';
            }
            $getter = 'get' . ucfirst($name);
            $return[$name] = $this->$getter();
        }

        return $return;
    }
}
