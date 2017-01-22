<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
    protected $fillable = ['n' , 'm' , 'cube'];
    protected $m , $n , $cube;

    /**
     * Cube constructor.
     * @param array $n
     */

    public function __construct($n , $m)
    {
        $this->setNValue($n);
        $this->setMValue($m);
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

    public function getMAttribute()
    {
        return $this->m;
    }

    public function getNAttribute()
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
    public function updateCube($x, $y, $z, $w)
    {
        $this->cube[$x][$y][$z] = $w;
    }

    public function queryCube($x1, $y1, $z1, $x2, $y2, $z2)
    {
        $sum = 0;
        for ($i = $x1; $i <= $x2; $i++) {
            for ($j = $y1; $j <= $y2; $j++) {
                for ($k = $z1; $k <= $z2; $k++) {
                    $sum += (int) $this->cube[$i][$j][$k];
                    
                }
            }
        }
        return $sum;
    }
    
    public function saveMValue($val)
    {
        session()->put('queries' ,$val);
    }
    
    public function setValue($session , $val , $pos = null)
    {
        $data = $this->getValue($session);
        $data[session()->get('test_cases')][$pos ?? $this->getValue('queries')] = $val;
        session()->put($session , $data);
    }
    
    public function getValue($value)
    {
        return  session()->get($value);
    }
    
    public function restart($session)
    {
        $value = $this->getValue($session);
        $this->saveMValue($value <= 0 ?: $value- 1);
    }
    
    public function has($session)
    {
        return  $this->getValue($session) > 0;
    }
}   
