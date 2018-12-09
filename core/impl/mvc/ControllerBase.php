<?php

namespace core\impl\mvc;

use core\auxiliary\PathHelper;
use core\enums\http\HttpCode;
use core\idea\http\ICookieManager;
use core\idea\http\IHttpContext;
use core\idea\http\IHttpRequest;
use core\idea\http\IHttpResponse;
use core\idea\http\ISessionManager;
use core\idea\mvc\IController;
use core\idea\routing\IRouteParams;
use core\impl\mvc\activator\Activator;
use core\impl\mvc\exception\LayoutNotFoundException;
use core\impl\mvc\exception\ViewNotFoundException;

abstract class ControllerBase implements IController
{
	private const LAYOUT_DIR = FS_ROOT.'/app/layout';
	private const VIEW_DIR   = FS_ROOT.'/app/view';
	
	/** @var IHttpContext */
	private $_context;
	
	/** @var IRouteParams */
	private $_routeParams;
	
	/** @var IHttpRequest */
	protected $request;
	
	/** @var IHttpResponse */
	protected $response;
	
	/** @var ISessionManager */
	protected $session;
	
	/** @var ICookieManager */
	protected $cookie;
	
	/** @var Activator */
	private $_activator;
	
	public final function __construct(
		IHttpContext $context, IRouteParams $params, Activator $activator
	)
	{
		$this->request  = $context->getRequest();
		$this->response = $context->getResponse();
		$this->session  = $context->getSession();
		$this->cookie   = $context->getCookie();
		
		$this->_routeParams = $params;
		$this->_activator   = $activator;
		$this->_context     = $context;
		
		$this->onInit();
	}
	
	/**
	 * @return bool continuationg
	 */
	public function before() : bool
	{
		return true;
	}
	
	public function after() : bool
	{
		return true;
	}
	
	protected function onInit()
	{
		
	}
	
	protected final function hasRouteParam(string $key) : bool
	{
		return $this->_routeParams->hasValue($key);
	}
	
	protected final function getRouteParam(string $key) : ?string
	{
		return $this->_routeParams->getValue($key);
	}
	
	protected final function getControllerInstance(string $name) : ControllerBase
	{
		return $this->_activator->getControllerInstance(
			$name,
			$this->_context,
			$this->_routeParams
		);
	}
	
	protected function view(
		string $view, string $layout = null, $data = null
	) : bool
	{
		$controllerName = $this->_getStaticShortName();
		
		$viewPath = PathHelper::combine(self::VIEW_DIR, $controllerName, $view.'.php');
		
		if (!file_exists($viewPath))
		{
			throw new ViewNotFoundException($viewPath, $viewPath);
		}
		
		ob_start();
		require_once $viewPath;
		$viewContent = ob_get_clean();
		
		if ($layout != null)
		{
			$layoutPath = PathHelper::combine(self::LAYOUT_DIR, $layout.'.php');
			
			if (!file_exists($layoutPath))
			{
				throw new LayoutNotFoundException($layout, $layoutPath);
			}
			
			ob_start();
			require_once $layoutPath;
			$layoutContent = ob_get_clean();
			
			$this->response->setBody($layoutContent);
		}
		else
		{
			$this->response->setBody($viewContent);
		}
		
		return true;
	}
	
	protected function notFound() : bool 
	{
		$this->response->setStatusCode(HttpCode::NOT_FOUND);
		return true;
	}
	
	protected function redirect(string $url) : bool 
	{
		$this->response->setHeader("Location", $url);
		return true;
	}
	
	protected function content(string $content) : bool 
	{
		$this->response->setBody($content);
		return true;
	}
	
	private function _getStaticShortName() : string
	{
		$class = static::class;
		
		$class = strtolower(str_replace('Controller', '', $class));
		
		$parts = explode('\\', $class);
		
		return array_pop($parts);
	}
	
	protected final function getModelInstance(string $name) : ModelBase
	{
		return $this->_activator->getModelInstance($name);
	}
}