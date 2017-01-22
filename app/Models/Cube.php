<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
    protected $m , $n , $cube;

    public function __construct($n)
    {
        $this->setNValue($n);
        $this->createCube();
    }

    /**
     * MUTATORS
     */

   public function setMValue($value)
   {
       $this->m = $value;
   }

   public function setNValue($value)
   {
       $this->n = $value;
   }

    /**
     * ACCESORS
     */

    public function getMValue()
    {
        return $this->m;
    }

    public function getNValue()
    {
        return $this->n;
    }

    /**
     * FUNCTIONS
     */
    public function createCube()
    {
        for ($i = 0; $i < $this->n; ++$i) {
            for ($j = 0; $j < $this->n; ++$j) {
                for ($k = 0; $k < $this->n; ++$k) {
                    $this->cube[$i][$j][$k] = 0;
                }
            }
        }
    }
    public function update($x, $y, $z, $w)
    {
        $this->cube[$x - 1][$y - 1][$z - 1] = $w;
    }

    public function newQuery($x1, $y1, $z1, $x2, $y2, $z2)
    {
        $sum = 0;
        for ($i = $x1 - 1; $i < $x2; ++$i) {
            for ($j = $y1 - 1; $j < $y2; ++$j) {
                for ($k = $z1 - 1; $k < $z2; ++$k) {
                    $sum += $this->cube[$i][$j][$k];
                }
            }
        }
        return $sum;
    }
}
