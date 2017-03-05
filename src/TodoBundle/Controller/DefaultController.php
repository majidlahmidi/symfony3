<?php

namespace TodoBundle\Controller;

use TodoBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	 $todos = $this->getDoctrine()
        ->getRepository('TodoBundle:Todo')
        ->findAll();

        return $this->render('TodoBundle:Default:index.html.twig', 
        	   array(
        	   	      'todos' => $todos
        	   	     )
        	   );
    }

    public function createTodoAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $todo = new Todo();
        //$task->setTask('Write a blog post');
        //$task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($todo)
            ->add('titre', TextType::class, array('attr' =>  array("class" => "form-control")))
            ->add('description', TextareaType::class, array('attr' =>  array("class" => "form-control")))
            ->add('save', SubmitType::class, array('label' => 'Créer la todo'),  array('attr' => array('class' => 'btn btn-default')))
            ->getForm();

        return $this->render('TodoBundle:Default:createTodo.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function saveTodoAction(Request $request)
    {
    	print_r($request);

    }

}
