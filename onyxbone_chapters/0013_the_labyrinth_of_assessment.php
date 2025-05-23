<?php
// Chapter 13: The Labyrinth of Assessment
session_start();
if (!isset($_SESSION['onyxbone_path'])) {
    $_SESSION['onyxbone_path'] = [];
}
if (isset($_GET['restart_assessment'])) {
    unset($_SESSION['onyxbone_assessment_complete']);
    unset($_SESSION['onyxbone_assessment_q']);
    unset($_SESSION['onyxbone_assessment_answers']);
    header('Location: 0013_the_labyrinth_of_assessment.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chapter 13: The Labyrinth of Assessment</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    body { background: #fdf6e3; color: #073642; font-family: monospace; max-width: 800px; margin: 0 auto; padding: 3em; }
    h1 { color: #b58900; text-transform: uppercase; border-bottom: 1px solid #eee8d5; padding-bottom: 0.2em; }
    .labyrinth-box { background: #eee8d5; border: 1px solid #b58900; padding: 2em; margin-top: 2em; box-shadow: 0 0 12px #cb4b16 inset; }
    .onyx-form { margin-bottom: 2em; }
    .onyx-qnum { font-weight: bold; color: #cb4b16; }
    .onyx-question { margin: 1.5em 0; font-size: 1.1em; }
    .onyx-btn { background: #b58900; color: #fdf6e3; border: none; padding: 0.6em 2em; margin-right: 1em; font-weight: bold; font-family: monospace; border-radius: 2px; cursor: pointer; box-shadow: 0 2px 6px #eee8d5 inset; }
    .onyx-btn:hover { background: #cb4b16; color: #fff; }
    .onyx-warning { color: #586e75; font-size: 0.95em; margin-top: 1em; }
    .footer { margin-top: 3em; text-align: center; color: #586e75; font-size: 0.95em; }
    ul { margin-top: 2em; }
    a { color: #b58900; text-decoration: none; }
    a:hover { text-decoration: underline; }
    .onyx-report { background:#fdf6e3; border:2px solid #cb4b16; padding:2em; box-shadow:0 0 12px #b58900 inset; }
    .onyx-report h2 { color:#cb4b16; text-transform:uppercase; letter-spacing:2px; }
    .onyx-report table { width:100%; border-collapse:collapse; margin-top:1.5em; }
    .onyx-report td { padding:0.4em 0; color:#073642; }
    .onyx-report td.label { font-weight:bold; text-align:right; color:#b58900; }
  </style>
</head>
<body>
  <h1>Chapter 13: The Labyrinth of Assessment</h1>
  <div class="labyrinth-box">
    <div style="text-align:right; margin-bottom:1em;">
      <a href="?restart_assessment=1" class="onyx-btn" style="background:#cb4b16; color:#fff; padding:0.4em 1.2em; font-size:0.95em;">Restart Assessment</a>
    </div>
    <?php
    // Questionnaire logic
    if (!isset($_SESSION['onyxbone_assessment_complete'])) {
        if (!isset($_SESSION['onyxbone_assessment_q'])) {
            $_SESSION['onyxbone_assessment_q'] = 0;
            $_SESSION['onyxbone_assessment_answers'] = [];
        }
        $questions = [
            'Do you experience persistent bone resonance or internal vibrations?',
            'Have you noticed geometric patterns on your skin or in your dreams?',
            'Do you feel compelled to obey unfamiliar instructions or rituals?',
            'Have you lost time or experienced memory bleed in the last 48 hours?',
            'Do you trust the official government narrative regarding ONYXBONE?',
            'Would you accept a permanent implant to ensure compliance?',
            'Have you witnessed others acting in synchrony without communication?',
            'Do you believe your body could be weaponised without your consent?',
            'Would you report a family member for non-compliance with vector protocols?',
            'Do you feel your mortality is now conditional on external signals?',
            'Have you been approached by any agency offering “protection” or “clarity”?',
            'Would you volunteer for experimental countermeasures if ordered?',
            'Do you believe the ONYXBONE is a threat, a tool, or an inheritance?',
            'Have you experienced intrusive thoughts about “calcium bloom rising”?',
            'Would you accept the loss of personal autonomy for collective safety?',
            'Do you suspect your responses are being monitored or scored?',
            'Do you consent to the use of your data for governmental exploitation coefficient analysis?'
        ];
        $qnum = $_SESSION['onyxbone_assessment_q'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
            $_SESSION['onyxbone_assessment_answers'][] = $_POST['answer'];
            $_SESSION['onyxbone_assessment_q']++;
            $qnum++;
        }
        if ($qnum < count($questions)) {
            echo '<form method="post" class="onyx-form">';
            echo '<div class="onyx-qnum">Assessment Question '.($qnum+1).' of '.count($questions).'</div>';
            echo '<div class="onyx-question">'.$questions[$qnum].'</div>';
            echo '<button class="onyx-btn" name="answer" value="Yes">Yes</button>';
            echo '<button class="onyx-btn" name="answer" value="No">No</button>';
            echo '</form>';
            echo '<div class="onyx-warning">All responses are permanently recorded. Non-compliance will be noted.</div>';
            echo '</div><div class="footer"><a href="../index.php">&larr; Return to ONYXBONE Index</a></div></body></html>';
            exit;
        } else {
            $_SESSION['onyxbone_assessment_complete'] = true;
            echo '<div style="color:#b58900; font-weight:bold; margin-bottom:2em;">Assessment complete. Your compliance and risk coefficients have been logged.</div>';
            echo '<div style="color:#cb4b16;">You may now proceed to the Labyrinth. Your answers will influence your path.</div>';
        }
    }
    $steps = [
        'start' => [
            'text' => 'You stand at the threshold of the ONYXBONE Labyrinth. The walls pulse with glyphs. A voice in your marrow whispers: "Choose your entry."',
            'choices' => [
                'left' => 'Enter the left archway (sigil: spiral)',
                'right' => 'Enter the right archway (sigil: fracture bar)',
            ]
        ],
        'left' => [
            'text' => 'The spiral archway closes behind you. The air is thick with incense and static. A masked figure blocks your path, offering two tokens.',
            'choices' => [
                'bone' => 'Take the bone token',
                'mirror' => 'Take the mirror token',
                'kneel' => 'Kneel and recite the marrow litany',
            ]
        ],
        'right' => [
            'text' => 'You pass through the fracture bar archway. The corridor narrows, lined with flickering screens. A phrase repeats: "Faith is encryption."',
            'choices' => [
                'recite' => 'Recite the anchor phrase',
                'refuse' => 'Refuse and walk in silence',
            ]
        ],
        'bone' => [
            'text' => 'The bone token fuses to your palm. You feel every secret you have ever kept. The path splits: one way descends, the other ascends.',
            'choices' => [
                'descend' => 'Descend into the marrow crypt',
                'ascend' => 'Ascend toward the echo chamber',
            ]
        ],
        'mirror' => [
            'text' => 'The mirror token reflects your face, but your eyes are not your own. A door opens, marked with the glyph for "consent."',
            'choices' => [
                'enter' => 'Enter the door',
                'shatter' => 'Shatter the mirror and turn back',
            ]
        ],
        'kneel' => [
            'text' => 'You kneel. The masked figure places a cold hand on your head. "The marrow remembers," they intone. You are shown three doors: one of bone, one of glass, one of shadow.',
            'choices' => [
                'bone_door' => 'Open the bone door',
                'glass_door' => 'Open the glass door',
                'shadow_door' => 'Open the shadow door',
            ]
        ],
        'bone_door' => [
            'text' => 'The bone door creaks open. Inside, a circle of acolytes chant in a language you almost understand. They offer you a chalice.',
            'choices' => [
                'drink' => 'Drink from the chalice',
                'refuse_chalice' => 'Refuse and step back',
            ]
        ],
        'glass_door' => [
            'text' => 'The glass door reveals a mirrored chamber. Your reflection multiplies, each version whispering a different secret.',
            'choices' => [
                'listen' => 'Listen to the whispers',
                'cover_ears' => 'Cover your ears and run',
            ]
        ],
        'shadow_door' => [
            'text' => 'The shadow door leads to a pitch-black corridor. You feel unseen hands guiding you. A voice asks: "What do you surrender?"',
            'choices' => [
                'surrender_name' => 'Surrender your name',
                'surrender_memory' => 'Surrender a memory',
            ]
        ],
        'recite' => [
            'text' => 'You speak: "He who knows the third hum sleeps in pattern." The screens go dark. A hidden panel slides open.',
            'choices' => [
                'proceed' => 'Proceed through the panel',
                'wait' => 'Wait for further instruction',
            ]
        ],
        'refuse' => [
            'text' => 'You walk in silence. The corridor loops endlessly. Your footsteps echo with unfamiliar voices. You sense you are being watched.',
            'choices' => [
                'speak' => 'Speak a control phrase',
                'sit' => 'Sit and surrender to the labyrinth',
            ]
        ],
        // Endings
        'descend' => [
            'text' => 'You descend into the marrow crypt. The walls close in. A chorus of voices welcomes you: "You are not required to remember." You are absorbed into the ONYXBONE.',
            'choices' => []
        ],
        'ascend' => [
            'text' => 'You ascend toward the echo chamber. Light fractures around you. You emerge changed, a vector among vectors. The labyrinth is now within you.',
            'choices' => []
        ],
        'enter' => [
            'text' => 'You enter the door. The congregation bows. You are offered the sceptre. The ritual is complete. You are the new anchor.',
            'choices' => []
        ],
        'shatter' => [
            'text' => 'You shatter the mirror. The fragments cut deep. You awaken outside the labyrinth, memory uncertain, hands stained with glyphs.',
            'choices' => []
        ],
        'proceed' => [
            'text' => 'You proceed through the panel. A single figure awaits, holding a bone key. "Become the tool," they whisper. You accept your role.',
            'choices' => []
        ],
        'wait' => [
            'text' => 'You wait. The darkness grows. You are forgotten by the labyrinth, a ghost in the system.',
            'choices' => []
        ],
        'speak' => [
            'text' => 'You speak: "Faith is encryption." The corridor straightens. You are released, but the phrase echoes in your bones forever.',
            'choices' => []
        ],
        'sit' => [
            'text' => 'You sit and surrender. The labyrinth accepts your offering. You dissolve into the cult of ONYXBONE.',
            'choices' => []
        ],
        'drink' => [
            'text' => 'The liquid burns cold. You see visions of the ONYXBONE’s origin. When you awaken, you are changed.',
            'choices' => []
        ],
        'refuse_chalice' => [
            'text' => 'The acolytes turn away. The room dissolves. You are back at the labyrinth entrance, but something is missing.',
            'choices' => []
        ],
        'listen' => [
            'text' => 'The whispers fill your mind. You learn a forbidden truth, but forget your way out.',
            'choices' => []
        ],
        'cover_ears' => [
            'text' => 'You run, but the whispers follow. You are lost in the labyrinth, forever pursued by your own secrets.',
            'choices' => []
        ],
        'surrender_name' => [
            'text' => 'You surrender your name. You become faceless, a vessel for the cult.',
            'choices' => []
        ],
        'surrender_memory' => [
            'text' => 'You surrender a memory. The labyrinth accepts your offering and shows you the exit, but you cannot recall what you have lost.',
            'choices' => []
        ],
    ];

    $current = 'start';
    if (isset($_GET['step']) && isset($steps[$_GET['step']])) {
        $current = $_GET['step'];
        $_SESSION['onyxbone_path'][] = $current;
    }

    function render_choices($choices) {
        $out = '<ul style="margin-top:2em;">';
        foreach ($choices as $key => $label) {
            $out .= '<li><a href="?step=' . $key . '" style="color:#b58900; font-weight:bold; text-decoration:none;">' . htmlspecialchars($label) . '</a></li>';
        }
        $out .= '</ul>';
        return $out;
    }

    // Report panel logic
    $endings = [
        'descend', 'ascend', 'enter', 'shatter', 'proceed', 'wait', 'speak', 'sit', 'drink', 'refuse_chalice', 'listen', 'cover_ears', 'surrender_name', 'surrender_memory'
    ];
    if (in_array($current, $endings)) {
        // Generate surreal metrics
        $answers = isset($_SESSION['onyxbone_assessment_answers']) ? $_SESSION['onyxbone_assessment_answers'] : [];
        $yesCount = count(array_filter($answers, function($a){return $a==="Yes";}));
        $noCount = count(array_filter($answers, function($a){return $a==="No";}));
        $metrics = [
            'ONYXBONE Compliance Index' => rand(37, 99) + $yesCount,
            'Weaponisation Potential' => rand(10, 100) . '%',
            'Mortality Drift' => number_format(rand(1, 9) + $noCount * 0.7, 2) . ' sigma',
            'Risk of Spontaneous Glyphogenesis' => rand(1, 100) . '%',
            'Governmental Exploitation Coefficient' => number_format(rand(0, 1) + $yesCount * 0.13, 2),
            'Mnemonic Integrity' => rand(0, 1) ? 'COMPROMISED' : 'PARTIAL',
            'Vector Alignment' => rand(0, 100) . '%',
            'Bone Signal Attunement' => rand(0, 100) . '%',
            'Consent Residue' => rand(0, 100) . ' ppm',
            'Cognitive Loopback' => rand(1, 7) . ' cycles',
            'Surveillance Saturation' => rand(60, 100) . '%',
            'Ritual Compliance' => rand(0, 100) . '%',
            'Acolyte Conversion Likelihood' => rand(0, 100) . '%',
            'Marrow Encryption Depth' => rand(1, 12) . ' layers',
            'Signal-to-Obedience Ratio' => number_format(rand(1, 9) / 10, 2),
            'Autonomy Leakage' => rand(0, 100) . '%',
            'Glyphic Recursion Index' => rand(1000, 9999),
        ];
        echo '<div class="onyx-report" style="margin-top:3em; background:#fdf6e3; border:2px solid #cb4b16; padding:2em; box-shadow:0 0 12px #b58900 inset;">';
        echo '<h2 style="color:#cb4b16; text-transform:uppercase; letter-spacing:2px;">ONYXBONE Assessment Report</h2>';
        echo '<table style="width:100%; border-collapse:collapse; margin-top:1.5em;">';
        foreach ($metrics as $label => $val) {
            echo '<tr><td style="padding:0.4em 0; color:#073642;">'.$label.'</td><td style="text-align:right; color:#b58900; font-weight:bold;">'.$val.'</td></tr>';
        }
        echo '</table>';
        echo '<div style="margin-top:2em; color:#586e75; font-size:0.95em;">This report is for internal use only. Non-compliance will be noted. You may <a href="?restart_assessment=1" style="color:#cb4b16; font-weight:bold;">restart assessment</a> at any time.</div>';
        echo '</div>';
    }
    ?>
    <p><?php echo $steps[$current]['text']; ?></p>
    <?php if (!empty($steps[$current]['choices'])) echo render_choices($steps[$current]['choices']); else echo '<p style="margin-top:2em; color:#cb4b16; font-weight:bold;">[END OF ASSESSMENT]</p>'; ?>
  </div>
  <div class="footer">
    <a href="../index.php">&larr; Return to ONYXBONE Index</a>
  </div>
</body>
</html>
