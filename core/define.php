<?php

define("DS", DIRECTORY_SEPARATOR);
define( "CORE", dirname(__FILE__));
define( "ROOT", dirname(CORE));
define("PUBLIQUE", ROOT.DS. "public");

const SRC = ROOT.DS."src";
const CONTROLLERS = SRC.DS."controllers";
const MODELS = SRC.DS."models";
const VIEWS = SRC.DS."views";
const TEMPLATES = SRC.DS."templates";
const HELPERS = CORE.DS."helpers";