<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */

namespace Rabari\BrandSlider\Api;

/**
 * Brand Repository Interface
 * @author   dev@rabari.com
 */
interface BrandRepositoryInterface
{
    /**
     * get brand collection of brandslider.
     *
     * @return \Rabari\BrandSlider\Model\ResourceModel\Brand\Collection
     */
    public function getBrandCollection();
}