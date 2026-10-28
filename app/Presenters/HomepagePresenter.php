<?php

declare(strict_types=1);

namespace App\Presenters;


final class HomepagePresenter extends BasePresenter
{
	public function renderDefault(): void
	{
		$this->template->projects = [
			[
				'name' => 'Kašpárek Mělník',
				'type' => 'Rodinné centrum',
				'description' => 'Komplexní web s administrací aktivit, táborů a online registracemi rodičů.',
				'stack' => ['PHP 8.4', 'Nette', 'MySQL', 'Bootstrap', 'Docker'],
				'url' => 'https://www.kasparek-melnik.cz/',
			],
			[
				'name' => 'Běh Hoštkou',
				'type' => 'Sportovní akce',
				'description' => 'Web běžeckého závodu s online registrací závodníků, správou výsledků a aktualitami.',
				'stack' => ['PHP 8.5', 'Symfony', 'MySQL', 'Tailwind', 'Docker'],
				'status' => 'Právě přechází na Symfony',
				'url' => 'https://beh-hostkou.cz/',
			],
			[
				'name' => 'Chalupa Babí 113',
				'type' => 'Ubytování',
				'description' => 'Prezentace rekreační chalupy v Krkonoších s vlastním online rezervačním systémem.',
				'stack' => ['PHP 8.5', 'Nette', 'MySQL', 'Bootstrap', 'Docker'],
				'url' => 'https://chalupababi113.cz/',
			],
			[
				'name' => 'Stano Bistro',
				'type' => 'Gastro',
				'description' => 'Prezentační web bistra s galerií a administrací denního menu.',
				'stack' => ['PHP 8.5', 'Nette', 'MySQL', 'Bootstrap', 'Docker'],
				'url' => 'https://stano-bistro.cz/',
			],
			[
				'name' => 'ZŠ Jungmannovy sady',
				'type' => 'Školství',
				'description' => 'Web základní školy s redakčním systémem pro aktuality, blog a program.',
				'stack' => ['PHP 8.1', 'Nette', 'MySQL', 'Bootstrap', 'Docker'],
				'url' => 'https://www.zsjungsady.cz/',
			],
			[
				'name' => 'Krby a kamna Mělník',
				'type' => 'Firemní prezentace',
				'description' => 'Moderní prezentace s galerií realizací pro výrobce kachlových kamen a krbů.',
				'stack' => ['Vanilla JS', 'Custom CSS'],
				'url' => 'https://krbykamna-melnik.cz/',
			],
		];

		$this->template->services = [
			['Webové aplikace', 'Od jednoduchých webů po business systémy na míru, včetně administrace.'],
			['E-shopy', 'Napojení na platební brány, dopravce a účetní systémy.'],
			['API a integrace', 'Návrh REST API a propojení s externími službami a systémy.'],
			['Responzivní weby', 'Weby, které se dobře používají na mobilu, tabletu i desktopu.'],
			['Optimalizace', 'Zrychlení stávajících aplikací, SEO a analýza výkonu.'],
			['Podpora a správa', 'Dlouhodobá údržba, hosting, aktualizace a další rozvoj.'],
		];

		$this->template->process = [
			['Konzultace', 'Ujasníme si cíle, rozsah, termíny a rozpočet.'],
			['Návrh', 'Struktura webu, datový model a vzhled, ještě než se napíše první řádek kódu.'],
			['Vývoj', 'Průběžně vidíte výsledek na testovací adrese a můžete ho připomínkovat.'],
			['Nasazení a péče', 'Automatické nasazení, hosting a podpora i po spuštění.'],
		];

		$this->template->stack = [
			'Backend' => ['PHP 8', 'Nette', 'Symfony', 'MySQL', 'PostgreSQL', 'REST API'],
			'Frontend' => ['JavaScript', 'TypeScript', 'Vue.js', 'Tailwind', 'Bootstrap'],
			'Nástroje' => ['Docker', 'Git', 'Playwright', 'Claude Code', 'Cursor'],
		];
	}
}
