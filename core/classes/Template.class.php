<?php
	class Template {

		private $vars = array();
		private $tpl_path = null;

		public function __construct($def_tpl) {
			$this->tpl_path = ROOT."/templates/{$def_tpl}/";
		}

		public function setVar($name, $value) {
			$this->vars[$name] = $value;
		}

		public function __get($name) {
			if ($this->vars[$name] != null) {
				return $this->vars[$name];
			} else {
				return "";
			}
		}

		public function load($tpl) {
			$tpl_new = $this->tpl_path.$tpl.".php";
			if (file_exists($tpl_new)) {
				include $tpl_new;
			} else {
				throw new Exception("Ошибка, шаблон {$tpl} не найден.");
			}
		}

	}
?>