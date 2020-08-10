<?php

/**
 * USSD
 */
class USSD
{
  
  /**
   * text
   *
   * @var string
   */
  private $text="";
  /**
   * response
   *
   * @var string
   */
  private $response="";

  /**
   * __construct
   * 
   * @return void
   */
  public function __construct()
  {
    // check request type
    $this->checkRequest($_SERVER['REQUEST_METHOD']);

    // set request values to object vars
    $this->text=$_POST["text"];
  }

  /**
   * responder
   *
   * @param  mixed $statusCode
   * @return void
   */
  private function responder(int $statusCode)
  {
    http_response_code($statusCode);
    header('Content-type: text/plain');
    echo $this->response;
    exit;
  }

  /**
   * checkRequest
   *
   * @param  mixed $method
   * @return void
   */
  private function checkRequest(string $method)
  {
    if($method!='POST')
    {
      $this->response="Sorry, unknown request!";
      $this->responder(405);
    }
    // check if post request has data
    elseif(empty($_POST))
    {
      $this->response="Sorry, request cannot be empty!";
      $this->responder(406);
    }
    // check if text exist
    elseif(!array_key_exists('text',$_POST))
    {
      $this->response="Sorry, text is required!";
      $this->responder(400);
    }

    return 0;
  }

  /**
   * getOption
   *
   * @return void
   */
  private function getOption()
  {
    /**
     * Since this is just a simple api, 
     * you are free to tail your options 
     * but if you want to scale this into 
     * a service I would suggest you add in 
     * some type of database to house all your 
     * options
     */
    if(empty($this->text))
    {
      $this->response = "CON Welcome to-------- how may we help you \n";
      $this->response .= "1. Headaches \n";
      $this->response .= "2. Abdominal pains \n";
      $this->response .= "3. Fever \n";
      $this->response .= "4. Diarrhea \n";
      $this->response .= "5. more";
    }
    // option 1 - user just started
    elseif($this->text=="1")
    {
      $this->response = "CON Which part of your head \n";
      $this->response .= "1. Right side \n";
      $this->response .= "2. Left side";
    }
    // option 2 - user their should choose how severe or mild his/her Stomach ache is
    elseif($this->text=="2")
    {
      $this->response = "CON What kind of pain \n";
      $this->response .= "1. Menstrual cramps \n";
      $this->response .= "2. Constipation";
    }
    // option 3 - user their should choose how severe or mild his/her Side pains is
    elseif($this->text=="3")
    {
     $this->response = "CON Which one is it \n";
      $this->response .= "1. Malaria \n";
      $this->response .= "2. Typhoid Fever";
    }
    // option 4 - user their should choose how severe or mild his/her Side pains is
    elseif($this->text=="4")
    {
     $this->response = "CON How bad is it \n";
      $this->response .= "1. Severe \n";
      $this->response .= "2. Mild";
    }
// option 5 - user their should choose how severe or mild his/her Side pains is
    elseif($this->text=="5")
    {
     $this->response = "CON Welcome to-------- how may we help you \n";
      $this->response .= "6. Chest pains \n";
     
      
     
    }


    // option 1*1 - User just has to choose 1
    elseif($this->text=="1*1")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     // option 1*1*1 - show user what to do now
    elseif($this->text=="1*1*1")
    {
      $this->response = "END This could be a Migraine headaches are often described as pounding, throbbing pain. They can last from 4 hours to 3 days and usually happen one to four times a month. Along with the pain, people have other symptoms, such as sensitivity to light, noise, or smells; nausea or vomiting; loss of appetite; and upset stomach or belly pain. When a child has a migraine, she may look pale, feel dizzy, and have blurry vision, fever, and an upset stomach. A small number of children's migraines include digestive symptoms, like vomiting, that happen about once a month. Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";
    
    }

     // option 1*1*1 - show user what to do now
    elseif($this->text=="1*1*2")
    {
      
      $this->response = "END This could be a Tension headaches are the most common type of headache among adults and teens. They cause mild to moderate pain and come and go over time. They usually have no other symptoms.Rest for some hours and if symptoms persist after, Visit the nearest pharmacy ";
    }

     // option 1*2 - User just has to choose 1
    elseif($this->text=="1*2")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     elseif($this->text=="1*2*1")
    {
      $this->response = "END This could be a Migraine headaches are often described as pounding, throbbing pain. They can last from 4 hours to 3 days and usually happen one to four times a month. Along with the pain, people have other symptoms, such as sensitivity to light, noise, or smells; nausea or vomiting; loss of appetite; and upset stomach or belly pain. When a child has a migraine, she may look pale, feel dizzy, and have blurry vision, fever, and an upset stomach. A small number of children's migraines include digestive symptoms, like vomiting, that happen about once a month. Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";

     // option 1*2 - show user what they cloud do now
    elseif($this->text=="1*2*2")
    {
      $this->response = "END This could be a Tension headaches are the most common type of headache among adults and teens. They cause mild to moderate pain and come and go over time. They usually have no other symptoms.Rest for some hours and if symptoms persist after, Visit the nearest pharmacy ";
      
    }

     // option 2*1 - User just has to choose 1
    elseif($this->text=="2*1")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     // option 2*1*1 - show user what to do now
    elseif($this->text=="2*1*1")
    {
      $this->response = "END  Drinking adequate fluids (eight glasses of liquid everyday). Water and other liquids add bulk to stools, making bowel movement easier.     A half hour walk after meals and avoiding lengthy bed rest.Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";
    
    }

     // option 1*1*1 - show user what to do now
    elseif($this->text=="2*1*2")
    {
      
      $this->response = "END  Drinking a cup of warm water in the morning in order todistend the stomach and stimulate the bowels. Visit the nearest pharmacy ";
    }

     // option 1*2 - User just has to choose 1
    elseif($this->text=="2*2")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     elseif($this->text=="2*2*1")
    {
      $this->response = "END Pain relievers. Over-the-counter pain relievers, such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve), at regular doses starting the day before you expect your period to begin can help control the pain of cramps. Prescription nonsteroidal anti-inflammatory drugs also are available.

          Start taking the pain reliever at the beginning of your period, or as soon as you feel symptoms, and continue taking the medicine as directed for two to three days, or until your symptoms are gone. Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";

     // option 1*2 - show user what they cloud do now
    elseif($this->text=="2*2*2")
    {
      $this->response = "END Exercise regularly. Physical activity, including sex, helps ease menstrual cramps for some women.
Use heat. Soaking in a hot bath or using a heating pad, hot water bottle or heat patch on your lower abdomen might ease menstrual cramps.
Try dietary supplements. A number of studies have indicated that vitamin E, omega-3 fatty acids, vitamin B-1 (thiamin), vitamin B-6 and magnesium supplements might reduce menstrual cramps.
Reduce stress. Psychological stress might increase your risk of menstrual cramps and their severity. Visit the nearest pharmacy ";
      
    }
   
        // option 3*1 - User just has to choose 1
    elseif($this->text=="3*1")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     // option 3*1*1 - show user what to do now
    elseif($this->text=="3*1*1")
    {
      $this->response = "END Malaria can be a life-threatening condition, especially if you’re infected with the parasite P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. Visit the nearest pharmacy or Go and see the doctor ";
    
    }

     // option 3*1*3 - show user what to do now
    elseif($this->text=="3*1*2")
    {
     
      $this->response = "END  Malaria can be a life-threatening condition, especially if you’re infected with the parasite P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. Visit the nearest pharmacy ";
    }

     // option 3*2 - User just has to choose 1
    elseif($this->text=="3*2")
    {
      $this->response = "CON How bad is it \n ";
      $this->response .= "1. Severe \n";
       $this->response .= "2. mild";
    }

     elseif($this->text=="3*2*1")
    {
      $this->response = "END The only effective treatment for typhoid is antibiotics. The most commonly used are ciprofloxacin (for non-pregnant adults) and ceftriaxone.

                      Other than antibiotics, it is important to rehydrate by drinking adequate water.

                   In more severe cases, where the bowel has become perforated, surgery may be required. Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";

     // option 3*2*2 - show user what they cloud do now
    elseif($this->text=="3*2*2")
    {
      $this->response = "END he only effective treatment for typhoid is antibiotics. The most commonly used are ciprofloxacin (for non-pregnant adults) and ceftriaxone.

                      Other than antibiotics, it is important to rehydrate by drinking adequate water. Visit the nearest pharmacy ";
      
    }
    
     // option 4*1 - User just has to choose 1
    elseif($this->text=="4*1")
    {
      $this->response = "CON How long has it lasted \n ";
      $this->response .= "1. Just started \n";
       $this->response .= "2. 2 days or more";
    }

     // option 4*1*1 - show user what to do now
    elseif($this->text=="4*1*1")
    {
      $this->response = "END Sipping on clear liquids, such as electrolyte drinks, water, or fruit juice without added sugar.
       After each loose stool, replacing lost fluids with at least 1 cup of liquid.
       Doing most of the drinking between, not during, meals.
       Consuming high potassium foods and liquids, such as diluted fruit juices, potatoes without the skin, and bananas Visit the nearest pharmacy or Go and see the doctor. ";
    
    }

     // option 4*1*2 - show user what to do now
    elseif($this->text=="4*1*2")
    {
     
      $this->response = "END  Antibiotics can only treat diarrhea due to bacterial infections. If the cause is a certain medication, switching to another drug might help. Always talk to a doctor before switching medications. Visit the nearest pharmacy ";
    }

     // option 4*2 - User just has to choose 1
    elseif($this->text=="4*2")
    {
      $this->response = "CON How long has it lasted \n ";
      $this->response .= "1. Just started \n";
       $this->response .= "2. 2 days or more";
    }

     elseif($this->text=="4*2*1")
    {
      $this->response = "END Mild cases of acute diarrhea may resolve without treatment. Visit the nearest pharmacy but if symptoms persist Go and see the doctor ";

     // option 3*2*2 - show user what they cloud do now
    elseif($this->text=="4*2*2")
    {
      $this->response = "END For persistent or chronic diarrhea, a doctor will treat any underlying causes in addition to the symptoms of diarrhea. Visit the nearest pharmacy ";
      
    }







     // option 6*1 - User just has to choose 1
    elseif($this->text=="6")
    {
      $this->response = "CON How long\n";
      $this->response .= "1. Panic attack";
    }

     // option 7*1*1 - show user what to do now
    elseif($this->text=="6*1")
    {
      $this->response = "END  Stick to your treatment plan. Facing your fears can be difficult, but treatment can help you feel like you're not a hostage in your own home.
          Join a support group. Joining a group for people with panic attacks or anxiety disorders can connect you with others facing the same problems.
           Avoid caffeine, alcohol, smoking and recreational drugs. All of these can trigger or worsen panic attacks.
           Practice stress management and relaxation techniques. For example, yoga, deep breathing and progressive muscle relaxation — tensing one muscle at a time, and then completely releasing the tension until every muscle in the body is relaxed — also may be helpful.
              Get physically active. Aerobic activity may have a calming effect on your mood.
                Get sufficient sleep. Get enough sleep so that you don't feel drowsy during the day. ";
    
    }

    

    

    return 0;
  }
  
  /**
   * init
   *
   * @return void
   */
  public function init()
  {
    $this->getOption();
    $this->responder(200);

    return 0;
  }

}

// init
$ussdApi=new USSD();
$ussdApi->init();

/** README
 * http response codes: https://httpstatuses.com
 * To run, goto your terminal and enter the command below without the quotes
 * Command: "php -S localhost:8000 ussd_class.php"
 * Now use your api client e.g Postman to make requests
 * 
 * POSTMAN IMPORT CURL:
 * curl --location --request POST 'http://localhost:8000' \
 * --header 'Content-Type: application/x-www-form-urlencoded' \
 * --data-urlencode 'phoneNumber=0200000000' \
 * --data-urlencode 'text='
 */

?>