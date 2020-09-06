<?php
/**
 * Date: 9/4/2020
 * Time: 2:29 PM
 * @author phamtomsage
 */


/**
 * Setting elements floating direction based in website current language
 *
 * @return string
 */
function setting_elements_floating_direction(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'float-left';
    }
    else if ($current_language === 'ar')
    {
        $output = 'float-right';
    }
    else
    {
        $output = 'float-left';
    }
    return $output;
}



/**
 * Setting elements bold arabic or english font based in website current language
 *
 * @return string
 */
function setting_elements_font_600(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'en-font-600';
    }
    else if ($current_language === 'ar')
    {
        $output = 'ar-font-600';
    }
    else
    {
        $output = 'en-font-600';
    }
    return $output;
}


/**
 * Setting elements regular arabic or english font based in website current language
 *
 * @return string
 */
function setting_elements_font_400(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'en-font-400';
    }
    else if ($current_language === 'ar')
    {
        $output = 'ar-font-400';
    }
    else
    {
        $output = 'en-font-400';
    }
    return $output;
}

/**
 * Setting elements warning border direction based in website current language
 *
 * @return string
 */
function setting_element_warning_border_direction(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'border-left-warning';
    }
    else if ($current_language === 'ar')
    {
        $output = 'border-right-warning';
    }
    else
    {
        $output = 'border-left-warning';
    }
    return $output;
}


/**
 * Setting elements border direction based in website current language
 *
 * @return string
 */
function setting_element_border_direction(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'border-left';
    }
    else if ($current_language === 'ar')
    {
        $output = 'border-right';
    }
    else
    {
        $output = 'border-left';
    }
    return $output;
}

/**
 * Setting elements reading style direction based in website current language
 *
 * @return string
 */
function setting_element_reading_style(): string
{
    $current_language = \App::getLocale();
    $output = '';
    if ($current_language === 'en')
    {
        $output = 'direction: ltr;';
    }
    else if ($current_language === 'ar')
    {
        $output = 'direction: rtl;';
    }
    else
    {
        $output = 'direction: ltr;';
    }
    return $output;
}