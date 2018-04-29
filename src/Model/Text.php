<?php

/**
 * This file is part of the Networking package.
 *
 * (c) net working AG <info@networking.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Networking\InitCmsBundle\Model;

use Networking\InitCmsBundle\Model\ContentInterface;
use Ibrows\Bundle\SonataAdminAnnotationBundle\Annotation as Sonata;

/**
 * Class Text
 * @package Networking\InitCmsBundle\Model
 * @author Yorkie Chadwick <y.chadwick@networking.ch>
 */
abstract class Text implements ContentInterface, TextInterface
{
    /**
     * @var integer $id
     */
    protected $id;


    /**
     * @var string $content
     * @Sonata\FormMapper(
     *      name="text",
     *      type="FOS\CKEditorBundle\Form\Type\CKEditorType",
     *      options={
     *          "label_render" = false,
     *          "horizontal_input_wrapper_class" = "col-md-12",
     *          "horizontal_label_offset_class" = "",
     *          "layout" = "horizontal",
     *          "label" = false,
     *          "required"=false
     *      }
     * )
     */
    protected $text;

    /**
     * @var \DateTime $createdAt
     */
    protected $createdAt;

    /**
     * @var \DateTime $updatedAt
     */
    protected $updatedAt;

    /**
     * clone action, set id null
     */
    public function __clone()
    {
        $this->id = null;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param  string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @return $this
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param  \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * @param array $params
     * @return array
     */
    public function getTemplateOptions($params = [])
    {
        return ['text' => $this->getText()];
    }

    /**
     * @return string
     */
    public function getSearchableContent()
    {
        return strip_tags($this->getText());
    }


    /**
     * @return array
     */
    public function getAdminContent()
    {
        return [
            'content' => ['text' => $this],
            'template' => 'NetworkingInitCmsBundle:Text:admin_text_block.html.twig'
        ];
    }

    /**
     * @return string
     */
    public function getContentTypeName()
    {
        return 'Text Block';
    }
}
