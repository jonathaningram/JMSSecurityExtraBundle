<?php

namespace Bundle\JMS\SecurityExtraBundle\Annotation;

/*
 * Copyright 2010 Johannes M. Schmitt
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Represents a @SecureParam annotation.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class SecureParam implements AnnotationInterface
{
    protected $name;
    protected $permissions;

    public function __construct(array $values)
    {
        if (!isset($values['name'])) {
            throw new \InvalidArgumentException('You must define a "name" attribute for each SecureParam annotation.');
        }
        if (!isset($values['permissions'])) {
            throw new \InvalidArgumentException('You must define a "permissions" attribute for each SecureParam annotation.');
        }

        $this->name = $values['name'];

        $this->permissions = array_map('trim', explode(',', $values['permissions']));
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }
}