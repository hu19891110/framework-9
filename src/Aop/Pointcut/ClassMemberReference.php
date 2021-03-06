<?php
declare(strict_types = 1);
/*
 * Go! AOP framework
 *
 * @copyright Copyright 2015, Lisachenko Alexander <lisachenko.it@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Go\Aop\Pointcut;

use Go\Aop\PointFilter;
use Go\Aop\Support\ModifierMatcherFilter;

/**
 * Data transfer object for storing a reference to the class member (property or method)
 */
class ClassMemberReference
{
    /**
     * Filter for class names
     *
     * @var PointFilter
     */
    private $classFilter;

    /**
     * Member visibility filter (public/protected/etc)
     *
     * @var ModifierMatcherFilter
     */
    private $visibilityFilter;

    /**
     * Filter for access type (statically "::" or dynamically "->")
     *
     * @var ModifierMatcherFilter
     */
    private $accessTypeFilter;

    /**
     * Member name pattern
     *
     * @var string
     */
    private $memberNamePattern;

    /**
     * Default constructor
     *
     * @param PointFilter $classFilter
     * @param ModifierMatcherFilter $visibilityFilter Public/protected/etc
     * @param ModifierMatcherFilter $accessTypeFilter Static or dynamic
     * @param string $memberNamePattern Expression for the name
     */
    public function __construct(
        PointFilter $classFilter,
        ModifierMatcherFilter $visibilityFilter,
        ModifierMatcherFilter $accessTypeFilter,
        string $memberNamePattern
    ) {
        $this->classFilter       = $classFilter;
        $this->visibilityFilter  = $visibilityFilter;
        $this->accessTypeFilter  = $accessTypeFilter;
        $this->memberNamePattern = $memberNamePattern;
    }

    public function getClassFilter(): PointFilter
    {
        return $this->classFilter;
    }

    public function getVisibilityFilter(): ModifierMatcherFilter
    {
        return $this->visibilityFilter;
    }

    public function getAccessTypeFilter(): ModifierMatcherFilter
    {
        return $this->accessTypeFilter;
    }

    public function getMemberNamePattern(): string
    {
        return $this->memberNamePattern;
    }
}
