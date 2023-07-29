<?php

/** @var \Modules\Base\Classes\Fetch\Rights $this */

$this->add_right("bill", "bill", "administrator", view:true, add:true, edit:true, delete:true);
$this->add_right("bill", "bill", "manager", view:true, add:true, edit:true, delete:true);
$this->add_right("bill", "bill", "supervisor", view:true, add:true, edit:true, delete:true);
$this->add_right("bill", "bill", "staff", view:true, add:true, edit:true);
$this->add_right("bill", "bill", "registered", view:true, add:true);
$this->add_right("bill", "bill", "guest", view:true, );

