<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255, nullable=false)
   */
  private $name;

  /**
   * @var string
   *
   * @ORM\Column(name="photo", type="string", length=255, nullable=true)
   */
  private $photo;

  /**
   * @Assert\File(maxSize="2M")
   */
  private $file;

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Set name
   *
   * @param string $name
   * @return User
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set photo
   *
   * @param string $photo
   * @return User
   */
  public function setPhoto($photo)
  {
    $this->photo = $photo;

    return $this;
  }

  /**
   * Get photo
   *
   * @return string
   */
  public function getPhoto()
  {
    return $this->photo;
  }

  public function getAbsolutePath()
  {
    return null === $this->photo
      ? null
      : $this->getUploadRootDir().'/'.$this->photo;
  }

  public function getWebPath()
  {
    return null === $this->photo
      ? null
      : $this->getUploadDir().'/'.$this->photo;
  }

  protected function getUploadRootDir()
  {
    // the absolute directory path where uploaded
    // documents should be saved
    return __DIR__.'/../../../web/'.$this->getUploadDir();
  }

  protected function getUploadDir()
  {
    // get rid of the __DIR__ so it doesn't screw up
    // when displaying uploaded doc/image in the view.
    return 'uploads/photos';
  }

  /**
   * Sets file.
   *
   * @param UploadedFile $file
   */
  public function setFile(UploadedFile $file = null)
  {
    $this->file = $file;
  }

  /**
   * Get file.
   *
   * @return UploadedFile
   */
  public function getFile()
  {
    return $this->file;
  }

  public function upload()
  {
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
      return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
      $this->getUploadRootDir(),
      $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->photo = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->file = null;
  }

}
