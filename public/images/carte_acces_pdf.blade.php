<!DOCTYPE html>
<html>
<head>
   <title>Carte d'Accès Élève</title>
   <style>
     /* ======================================= */
     /* POLICES ET PARAMÈTRES GÉNÉRAUX */
     /* ======================================= */
     body { 
       /* DejaVu Sans est CRUCIAL pour les accents et caractères spéciaux */
       font-family: DejaVu Sans, sans-serif; 
       font-size: 9pt; /* Taille de police légèrement augmentée */
       margin: 0; 
       padding: 0; 
     }

     /* ======================================= */
     /* STYLE DE LA CARTE - DIMENSIONS ÉLARGIES */
     /* ======================================= */
     .carte-container {
       /* NOUVELLES DIMENSIONS : 100mm x 65mm */
       width: 130mm;  
       height: 70mm;  
       
       border: 1px solid #ccc; 
       border-radius: 12px; /* Rayon légèrement augmenté */
       padding: 6mm; /* Padding augmenté */
       position: relative; 
       overflow: hidden; 
       box-sizing: border-box; 
       background-color: #ffffff; /* Fond blanc par défaut */
     }

     /* ======================================= */
     /* SECTION DE L'ENTÊTE (ALIGNEMENT PAR TABLEAU) */
     /* ======================================= */
     .header-table {
       width: 100%;
       border-collapse: collapse;
     }
     
     /* Cellule du logo/contact (gauche) */
     .logo-cell {
       width: 15mm; /* Élargi */
       padding-right: 4mm;
       vertical-align: top;
     }

     /* Cellule du titre/nom école (centre) - Doit laisser de la place à la photo */
     .info-cell {
       width: 50mm; 
       vertical-align: top;
       padding-left: 1mm;
     }

     /* ======================================= */
     /* PHOTO (POSITIONNEMENT ABSOLU) */
     /* ======================================= */
     .photo-container { 
       position: absolute;
       top: 6mm; /* Égal au padding du .carte-container */
       right: 11mm; /* Égal au padding du .carte-container */   
       width: 35%; /* Photo plus grande */
       max-width: 120px;
       height: 30mm; /* Photo plus grande */
       aspect-ratio: 3/4;
     }

     .photo-img {
       width: 100%; 
       height: 100%; 
       object-fit: cover;
     }
     
     /* ======================================= */
     /* STYLES DES TEXTES */
     /* ======================================= */
     .logo-img {
       width: 93%; /* Logo plus grand */
       height: 32%;
     }
     
     .school-name {
      position: absolute;
      left: 27%;
      top: 9%;
       font-size: 16pt; /* Taille augmentée */
       font-weight: bold;
       color: #1a1a1a;
       margin-top: 0;
       margin-bottom: 0;
     }

     .title-carte {
      position: absolute;
      top: 28%;
      left: 27%;
       font-size: 13pt; /* Taille augmentée */
       font-weight: bold;
       color: #D32F2F; 
       text-transform: uppercase;
       margin-bottom: 0;
     }

     .annee-scolaire {
      position: absolute;
      top: 42%;
      left: 27%;
       font-size: 8pt; /* Taille augmentée */
       color: #666;
       margin-top: 0;
       margin-bottom: 7px; /* Espace augmenté */
     }

     .contact-info {
       font-size: 8pt; /* Taille augmentée */
       color: #333;
       margin-top: 5px;
     }

     /* Lignes de détails du bas */
     .detail-row {
       margin-top: 2mm; /* Espace augmenté */
       line-height: 1.4; /* Hauteur de ligne améliorée */
     }

     .label {
       font-weight: normal;
       color: #0a42aaff;
       margin-right: 5px;
       font-size: 10pt; /* Taille augmentée */
     }

     .value {
       font-weight: bold;
       color: #000;
       font-size: 9pt; /* Taille augmentée */
     }

     .line-separator {
    border-bottom: 1px dashed #000000ff; /* Actuellement 1 pixel d'épaisseur */
    margin: 7px 0; 
}
     
     .footer-message {
       position: absolute;
       top: 85%;
       bottom: 3mm; /* Ajusté pour le nouveau padding */
       left: 25mm; /* Ajusté pour le nouveau padding */
       text-align: center;
       width: 88mm; /* Nouveau calcul : 100mm - 2*6mm de padding = 88mm */
       font-size: 7pt; /* Taille augmentée */
       font-weight: bold;
       color: #130303ff; /* Rendu plus visible en rouge */
       font-size: 2.6mm;
     }

     .numinc{
      position: absolute;
       top: 88%;
       left: 72%;
       color: #0e0aeeff;
     }

     
     
     .qr-code-placeholder {
       /* Positionnement absolu pour un QR Code à droite */
       position: absolute;
       bottom: 22mm; /* Espace au-dessus du message de pied de page */
       right: 11mm; 
       width: 22%; 
       top: 53%;
       height: 27mm;
       border: 1px solid #ccc;
       display: flex;
       align-items: center;
       justify-content: center;
       background-color: #f9f9f9;
     }

     .qr-code-placeholder span {
       font-size: 7pt;
       color: #aaa;
     }
   </style>
</head>
<body>

<div class="carte-container">
   
   <!-- PHOTO (POSITIONNEMENT ABSOLU) -->
   <div class="photo-container">
     @if ($eleve->photo_url)
       <?php $imagePath = public_path('storage/' . $eleve->photo_url); ?>
       <img src="{{ $imagePath }}" alt="Photo Élève" class="photo-img">
     @else
       <div class="photo-img" style="background-color: #f0f0f0; border: 1px solid #ccc; text-align: center; line-height: 20mm; font-size: 8pt;">
         <span style="color:#aaa;">Photo</span>
       </div>
     @endif
   </div>

   <table class="header-table">
     <tr>
       <td class="logo-cell">
         <!-- Utilisez un placeholder pour le logo si 'public_path' n'est pas disponible -->
         <img src="{{ public_path('images/logo.png') }}" onerror="this.onerror=null;this.src='https://placehold.co/40x40/d32f2f/ffffff?text=LOGO'" alt="Logo" class="logo-img"> 
         
         <p class="contact-info" style="margin-top: 5px;">
           Contact<br>
           {{ $eleve->tuteur_telephone ?? 'N/A' }} 
         </p>
       </td>
       
       <td class="info-cell">
         <h1 class="school-name">REVEAL SCHOOL</h1>
         <p class="title-carte">&nbsp;&nbsp;&nbsp;CARTE D'ACCÈS</p>
         <p class="annee-scolaire">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Année Scolaire: 2025-2026</p>
       </td>
     </tr>
   </table>
   
   <!-- CORPS DE LA CARTE -->
   <div style="margin-top: -12px;">
     
     <!-- LIGNE NOM / MATRICULE -->
     <div class="detail-row">
       <span class="label">Nom:</span>
       <span class="value">{{ $eleve->nom }}</span>
       
       <!-- Ajustement de la marge droite pour le matricule (moins besoin de marge avec la photo plus petite) -->
       <span style="float: right; margin-right: 64mm;"> 
         <span class="label">Matricule:</span>
         <span class="value">{{ $eleve->matricule }}</span>
       </span>
     </div>

     <!-- LIGNE PRÉNOM -->
     <div class="detail-row">
       <span class="label">Prénom:</span>
       <span class="value">{{ $eleve->prenoms }}</span>
     </div>
     
     <!-- LIGNE DATE DE NAISSANCE -->
     <div class="detail-row">
       <span class="label">Date de Naissance:</span>
       <span class="value">{{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d/m/Y') }} à {{ $eleve->lieu_naissance ?? 'N/A' }}</span>
     </div>
     

     <!-- LIGNE CLASSE / SEXE -->
     <div class="detail-row">
       <span class="label">Classe:</span>
       <span class="value">{{ $eleve->classe }}</span>
       <!-- Ajustement de la marge droite pour le sexe -->
       <span style="float: right; margin-right: 54mm;">
         <span class="label">Sexe</span>
         <span class="value">{{ $eleve->sexe == 'Masculin' ? 'M' : 'F' }}</span>
       </span>
     </div>
   </div>

   <!-- SÉPARATEUR -->
   <div class="line-separator" style="margin-right: 40mm;"></div> <!-- Laisse de la place au QR Code -->
   
   <!-- ESPACE POUR LE QR CODE (AJOUTÉ POUR SIMPLIFIER LE FLUX) -->
   <div class="qr-code-placeholder">
     <span>Code QR</span>
   </div>

   <!-- MESSAGE DE PIED DE PAGE -->
   <p class="footer-message">
     Cette Carte est obligatoire <br> pour avoir accès à l'établissement
   </p>
   <p class="numinc">1116</p>

</div>

</body>
</html>
