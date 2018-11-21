<?php declare(strict_types=1);
/*
Plugin Name:  SOZO Upstream ACF
Description:  Restricts ACF field edits to WP_ENV=development
License:      GPL2
Version:      1.0.0
*/
use SOZO\Fixes\UpstreamAcf;
new UpstreamAcf();