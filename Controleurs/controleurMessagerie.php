<?php

  require_once 'Modeles/utilisateurs.php';
  require_once 'Modeles/messagerie.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Vues/vue.php';

  class controleurMessagerie{

    public function affichageMessagerie(){
      $messagerie = new messagerie();
      $conversations = $messagerie->recupConversation($_SESSION['pseudo'])->fetchAll();

      $vue = new Vue('Messagerie');
      $vue->generer(array('conversations' => $conversations));
    }

    public function affichageNouvelleConversation(){
      $messagerie = new messagerie();
      $destinataires = $messagerie->recupDestinatairesPossibles()->fetchAll();
      $conversation = $messagerie->recupConversation($_SESSION['pseudo'])->fetch();
      $date = date('Y-m-d H:i:s');

      if (isset($_POST['envoyer'])) {
        if($_POST['destinataire'] != "" && $_POST['message'] != " "){
          if (($conversation[0] == $_SESSION['pseudo'] && $conversation[1] == $_POST['destinataire']) || ($conversation[1] == $_SESSION['pseudo'] && $conversation[0] == $_POST['destinataire'])) {
            $envoyerMessage = $messagerie->envoyerMessage($_SESSION['pseudo'], $_POST['destinataire'], $date, $_POST['message']);
            header("Location: index.php?page=conversation&correspondantA=".$_SESSION['pseudo']."&correspondantB=".$_POST['destinataire']);
          } else{
            $envoyerMessage = $messagerie->envoyerMessage($_SESSION['pseudo'], $_POST['destinataire'], $date, $_POST['message']);
            $nouvelleConversation = $messagerie->nouvelleConversation($_SESSION['pseudo'], $_POST['destinataire']);
            header("Location: index.php?page=conversation&correspondantA=".$_SESSION['pseudo']."&correspondantB=".$_POST['destinataire']);
          }

        } else{
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("Some fields have not been filled !")</script> <?php
          } else {
            ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
          }
        }
      }

      $vue = new Vue('NouvelleConversation');
      $vue->generer(array('destinataires' => $destinataires));
    }

    public function affichageDetailsConversation($correspondantA, $correspondantB){
      $messagerie = new messagerie();

      $updateSatutMessage = $messagerie->updateSatutMessageAbsent();

      if (isset($_POST['message'])) {
        if (!empty($_POST['message'])) {
          $message = $_POST['message'];
          $date = date('Y-m-d H:i:s');
          $envoiReponse = $messagerie->repondreConversation($message, $_SESSION['pseudo'], $_GET['correspondantB'], $date);
        }
      }

      $conversations = $messagerie->recupDetailsConversation($correspondantA, $correspondantB)->fetchAll();

      $vue = new Vue('Conversation');
      $vue->generer(array('messages' => $conversations, 'dernierID' => $dernierID, 'derniersMessages' => $recupNouveauxMessages, 'nouveauxMessages' => $nouveauxMessages));
    }

    public function nouveauxMessages(){
      $messagerie = new messagerie();

      $id = (int) $_GET['id'];
      $nouveauxMessages = $messagerie->recupNouveauxMessages($id, $_SESSION['pseudo'], $_GET['correspondantB'])->fetchAll();

      $photo = new membres();
      foreach ($nouveauxMessages as list($id, $expediteur, $destinataire, $date, $message)) {

        if ($destinataire == $_SESSION['pseudo']) {
          $updateSatutMessage = $messagerie->updateSatutMessageDirect($id);
        }

        $afficher = $photo->affichagePhoto($expediteur);
        $dateEntiereSujet = date_create($date);
        $dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y');
        $heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s');

        if ($destinataire == $_SESSION['pseudo']) {
          echo "<tr id = ".$id."> <td class='pseudoAmi'> <div class='pseudoAmiDiv'><img src='imagesUtilisateurs/".$afficher[0]."'/></div></td><td class='messageConversationAmi'><div class='messageConversationAmiDiv'>".$message."</div><div class='heureMessage'>le ".$dateSujetDernierMessage." à ".$heureSujetDernierMessage."</div></td><td></td></tr><script src='https:ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script><script type='text/javascript'>var x = document.getElementById('conteneurConversation'); x.scrollTop = x.scrollHeight;</script>";
        } else{
          echo "<tr id = ".$id."> <td> </td><td class='messageConversationSessionPseudo'><div class='messageConversationSessionPseudoDiv'>".$message."</div><div class='heureMessage'>le ".$dateSujetDernierMessage." à ".$heureSujetDernierMessage."</div></td><td class='monPseudo'><div class='monPseudoDiv'><img src='imagesUtilisateurs/".$afficher[0]."'/></div></td></tr> <script src='https:ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script><script type='text/javascript'>var x = document.getElementById('conteneurConversation'); x.scrollTop = x.scrollHeight;</script>";
        }

      }
    }

    public function nouveauxMessagesNotifs(){
      $messagerie = new messagerie();
      $nouveauxMessagesNotifs = $messagerie->recupMessagesNonLus()->fetch();
      echo "<span class='nbrMessages' style='background-color:red;border:2px solid;color:white;font-weight:bold;border-radius:30px;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;'>".$nouveauxMessagesNotifs[0]."</span>";
    }

    public function nouveuxMessagesConversationNotifExpediteur(){
      $messagerie = new messagerie();
      $conversations = $messagerie->recupConversation($_SESSION['pseudo'])->fetchAll();
      foreach ($conversations as list($expediteur, $destinataire)) {
        if ($expediteur == $_SESSION['pseudo']) {
          $nouveauxMessagesConversationNotifs = $messagerie->recupMessagesConversationsNonLus($destinataire)->fetch();
          echo "<span id='nbrMessagesConversationExpediteur' style='background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;'>".$nouveauxMessagesConversationNotifs[0]."</span>";
        }
      }
    }

    public function nouveauxMessagesConversationNotifsDestinataire(){
      $messagerie = new messagerie();
      $conversations = $messagerie->recupConversation($_SESSION['pseudo'])->fetchAll();
      foreach ($conversations as list($expediteur, $destinataire)) {
        if ($desintaire == $_SESSION['pseudo']) {
          $nouveauxMessagesConversationNotifs = $messagerie->recupMessagesConversationsNonLus($expediteur)->fetch();
          echo "<span id='nbrMessagesConversationDestinataire' style='background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;'>".$nouveauxMessagesConversationNotifs[0]."</span>";
        }
      }
    }
  }





?>
