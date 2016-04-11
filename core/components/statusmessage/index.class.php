<?php

/**
 * Class statusMessageMainController
 */
abstract class statusMessageMainController extends modExtraManagerController {
	/** @var statusMessage $statusMessage */
	public $statusMessage;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('statusmessage_core_path', null, $this->modx->getOption('core_path') . 'components/statusmessage/');
		require_once $corePath . 'model/statusmessage/statusmessage.class.php';

		$this->statusMessage = new statusMessage($this->modx);
		//$this->addCss($this->statusMessage->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->statusMessage->config['jsUrl'] . 'mgr/statusmessage.js');
		$this->addHtml('
		<script type="text/javascript">
			statusMessage.config = ' . $this->modx->toJSON($this->statusMessage->config) . ';
			statusMessage.config.connector_url = "' . $this->statusMessage->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('statusmessage:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends statusMessageMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}