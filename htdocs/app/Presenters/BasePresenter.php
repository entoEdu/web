<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Contributte;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    const CZECH = "cs";
    const ENG = "en";
    const SLOVAK = "sk";

    public $namesOfLocales = [self::CZECH => "CZ", self::SLOVAK => "SK", self::ENG=>"ENG"];

    /** @var Nette\Localization\ITranslator @inject */
    public $translator;

    /** @var Contributte\Translation\LocalesResolvers\Session @inject */
    public $translatorSessionResolver;


    public function handleChangeLocale(string $locale): void
    {
        $this->translatorSessionResolver->setLocale($locale);
        $this->redirect('this');
    }

    public function beforeRender()
    {
        $this->template->locale = $this->translator->getLocale();
        $this->template->localeAvailable = $this->getOtherLocale();
        $this->template->localeNames = $this->namesOfLocales;

    }

    protected function getOtherLocale():array
    {
        $allLocales= array( self::ENG, self::CZECH, self::SLOVAK);
        if (($key = array_search($this->translator->getLocale(), $allLocales)) !== false) {
            unset($allLocales[$key]);
        }
        return $allLocales;
    }

}
