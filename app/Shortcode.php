<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortcode extends Model
{
  protected $table = 'shortcode';
  protected $primaryKey = 'fld_int_id';
  protected $name = 'fld_chr_name';

}
