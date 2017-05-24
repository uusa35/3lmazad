<?php
namespace App\Services\Traits;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

trait LocaleTrait
{

    /**
     * @param $name
     * @return localized string
     * Return Localized String
     */
    public function __get($name)
    {
        $locale = App::getLocale();

        if (in_array($name, array_values($this->localeStrings))) {

            if ($locale == 'en') {

                if (!is_null($this->{$name . '_en'})) {

                    return $this->{$name . '_en'};

                }

                return $this->{$name . '_ar'};

            } else {

                if (!is_null($this->{$name . '_ar'})) {

                    return $this->{$name . '_ar'};

                }

                return $this->{$name . '_en'};
            }
        }

        return parent::__get($name);
    }
}