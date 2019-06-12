<?php 
      if($_POST['category']=='-1' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='-1' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='-1' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='-1' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='-1' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='-1' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='0' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='0' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='0' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='0' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='0' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='0' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Afacere' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='1' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='1' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='1' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='1' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='1' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='1' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Arta si design' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='2' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='2' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='2' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='2' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='2' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='2' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Comunicare' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='3' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='3' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='3' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='3' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='3' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='3' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Cumparaturi' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }
      
      else if($_POST['category']=='4' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='4' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='4' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='4' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='4' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='4' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Divertisment' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

       else if($_POST['category']=='5' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='5' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='5' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='5' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='5' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='5' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Domeniul Medical' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='6' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='6' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='6' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='6' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='6' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='6' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Educatie' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='7' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='7' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='7' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='7' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='7' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='7' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Familie' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='8' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='8' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='8' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='8' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='8' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='8' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }

      else if($_POST['category']=='9' && $_POST['so']=='-1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='9' && $_POST['so']=='-1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and COST = 0 and ACCEPT_TAG is not null";
       }
      else if($_POST['category']=='9' && $_POST['so']=='-1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and COST > 0 and ACCEPT_TAG is not null";
       }
       else if($_POST['category']=='9' && $_POST['so']=='0' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like '%Windows%' and ACCEPT_TAG is not null";
      }
       else if($_POST['category']=='9' && $_POST['so']=='0' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like '%Windows%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='0' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like '%Windows%' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='1' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like 'Linux' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='1' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like 'Linux' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='1' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like 'Linux' and COST > 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='2' && $_POST['price']=='-1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Altele' and S_O like '%Mac%' and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='2' && $_POST['price']=='0'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Mac%' and COST = 0 and ACCEPT_TAG is not null";
      }
      else if($_POST['category']=='9' && $_POST['so']=='2' && $_POST['price']=='1'){
         $sql = "SELECT * from apps where CATEGORIE like 'Jocuri' and S_O like '%Mac%' and COST > 0 and ACCEPT_TAG is not null";
      }
  ?>