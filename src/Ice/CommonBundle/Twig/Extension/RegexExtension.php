<?php
/**
 * Created by ICE DEV.
 * User: jpd
 * Date: 26/03/14
 * Time: 18:04
 */

namespace Ice\CommonBundle\Twig\Extension;

class RegexExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'preg_replace' => new \Twig_Filter_Method($this, 'pregReplace'),
        );
    }

    public function getFunctions()
    {
        return array(
            'getPregMatchByIndex' => new \Twig_Function_Method($this, 'getPregMatchByIndex'),
        );
    }
    /**
     * Call the original preg_replace function as filter in Twig
     *
     * @param mixed $subject
     * @param mixed $pattern
     * @param mixed $replacement
     * @param int $limit
     *
     * @return mixed
     */
    public function pregReplace($subject, $pattern, $replacement, $limit = -1)
    {
        return preg_replace($subject, $pattern, $replacement, $limit);
    }

    /**
     * Returns the value at $index in $matches array from original function preg_match
     *
     * @param     $pattern
     * @param     $subject
     * @param int $index
     * @param int $flags
     * @param int $offset
     *
     * @return mixed
     */
    public function getPregMatchByIndex($pattern, $subject, $index = 0, $flags = 0, $offset = 0)
    {
        $matches = array();
        preg_match($pattern, $subject, $matches , $flags, $offset);
        return $matches[$index];
    }

    public function getName()
    {
        return 'regex_extension';
    }
} 