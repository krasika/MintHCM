<?php
namespace Api\V8\Param;

use Api\V8\Param\Options as ParamOption;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetModulesParams extends BaseParam
{
    /**
     * @return string
     */
    public function getModuleName()
    {
        return $this->parameters['moduleName'];
    }

    /**
     * @return array|null
     */
    public function getFields()
    {
        return $this->parameters['fields'] ?? null;
    }

    /**
     * @return PageParams
     */
    public function getPage()
    {
        return $this->parameters['page'] ?? new PageParams($this->validatorFactory, $this->beanManager);
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->parameters['sort'] ?? '';
    }

    /**
     * @return string
     */
    public function getFilter()
    {
        return $this->parameters['filter'] ?? '';
    }

    /**
     * @inheritdoc
     */
    protected function configureParameters(OptionsResolver $resolver)
    {
        $this->setOptions(
            $resolver,
            [
                ParamOption\ModuleName::class,
                ParamOption\Fields::class,
                ParamOption\Page::class,
                ParamOption\Sort::class,
                ParamOption\Filter::class
            ]
        );
    }
}
