<?php

/** @var \Modules\Base\Classes\Fetch\Rights $this */

$this->add_right("bill", "bill", "administrator", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "bill", "manager", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "bill", "supervisor", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "bill", "staff", view: true, add: true, edit: true);
$this->add_right("bill", "bill", "registered", );
$this->add_right("bill", "bill", "guest", );

$this->add_right("bill", "item", "administrator", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "item", "manager", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "item", "supervisor", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "item", "staff", view: true, add: true, edit: true);
$this->add_right("bill", "item", "registered", );
$this->add_right("bill", "item", "guest", );

$this->add_right("bill", "itemrate", "administrator", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "itemrate", "manager", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "itemrate", "supervisor", view: true, add: true, edit: true, delete: true);
$this->add_right("bill", "itemrate", "staff", view: true, add: true, edit: true);
$this->add_right("bill", "itemrate", "registered", );
$this->add_right("bill", "itemrate", "guest", );

