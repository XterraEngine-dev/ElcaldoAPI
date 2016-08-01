<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaldosTest extends TestCase
{

    use DatabaseMigrations;

    public function CaldosTest()
    {
        $data = $this->getData();
        // Creamos un nuevo usuario y verificamos la respuesta
        $this->post('/caldos', $data)
            ->seeJsonEquals(['created' => true]);

        $data = $this->getData(['nombre' => 'jane']);
        // Actualizamos al usuario recien creado (id = 1)
        $this->put('/caldos/1', $data)
            ->seeJsonEquals(['updated' => true]);

        // Obtenemos los datos de dicho usuario modificado
        // y verificamos que el nombre sea el correcto
        $this->get('caldos/1')->seeJson(['nombre' => 'jane']);

        // Eliminamos al usuario
        $this->delete('caldos/1')->seeJson(['deleted' => true]);
    }

    public function getData($custom = array())
    {
        $data = [
            'nombre'       => 'FERNANDO',
            'ingredientes' => 'FERNANDO@doe.com',
            'preparacion'  => '12345',
            'region'       => '12345',
            'imagen'       => '12345',
        ];
        $data = array_merge($data, $custom);
        return $data;
    }
}