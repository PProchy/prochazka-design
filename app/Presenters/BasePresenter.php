<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	private string $wwwDir;


	/**
	 * Called from config/services.neon with %wwwDir%, the directory of index.php.
	 */
	public function setWwwDir(string $wwwDir): void
	{
		$this->wwwDir = $wwwDir;
	}


	protected function beforeRender(): void
	{
		$this->template->assetVersion = $this->getAssetVersion();
	}


	/**
	 * Changes whenever a deploy uploads a new stylesheet or script, so browsers drop their cached copy.
	 */
	private function getAssetVersion(): string
	{
		return (string) max(filemtime($this->wwwDir . '/css/main.css'), filemtime($this->wwwDir . '/js/main.js'));
	}
}
