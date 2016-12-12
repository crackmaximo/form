<?php

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;
use AppBundle\Entity\Client;
use AppBundle\Entity\Product;
use AppBundle\Entity\LineTask;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\TaskType;




class TaskController extends Controller
{

	public function newAction(Request $request){
		

		$task = new Task();
		//$lineTask = new LineTask();
		//$lineTask->setName('antonio');
		//$task->getLineTask()->add($lineTask);

		$form = $this->createForm(new TaskType(), $task );
		
		  $form->handleRequest($request);
		  
         if ($form->isValid()) {
         	exit(\Doctrine\Common\Util\Debug::dump($task));
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($task);
            $em->flush();
        
		
            		
                return $this->redirectToRoute('list_task');
            }
        
    
        
		return $this->render('AppBundle:Task:NewTask.html.twig', array('form'=>$form->createView()));
		
	}	
	
	
	
	
}
