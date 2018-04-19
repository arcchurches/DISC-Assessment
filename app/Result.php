<?php

namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function viewable(){
        $d = 0;
        $i = 0;
        $s = 0;
        $c = 0;

        $answers = json_decode($this->answers);
        $sanswers = base64_encode(serialize($answers));
        for($x = 1; $x <= 5; $x++) {
            $d = $d+intval($answers[$x]);
        }
        for($x = 6; $x <= 10; $x++) {
            $i = $i+intval($answers[$x]);
        }
        for($x = 11; $x <= 15; $x++) {
            $s = $s+intval($answers[$x]);
        }
        for($x = 16; $x <= 20; $x++) {
            $c = $c+intval($answers[$x]);
        }
        $errors = '';
        $sra = array_slice($answers, 21, 73);
        array_unshift($sra, -1);
        $res = array('d'=>$d,
                     'i'=>$i,
                     's'=>$s,
                     'c'=>$c);
        $ftres = array_count_values($res);
        arsort($ftres);
        if(max($ftres) >= 3) {
            $errors = '<b>Your responses indicate a period of change or transition (ex. just got married, changed jobs, moved states). For a more accurate result consider retaking the Personality Profile again in six weeks.</b><br/><br/>';
        }
        $sres = array(
            'a' => (intval($sra[1])+intval($sra[25])+intval($sra[49])),
            'b' => (intval($sra[2])+intval($sra[26])+intval($sra[50])),
            'c' => (intval($sra[3])+intval($sra[27])+intval($sra[51])),
            'd' => (intval($sra[4])+intval($sra[28])+intval($sra[52])),
            'e' => (intval($sra[5])+intval($sra[29])+intval($sra[53])),
            'f' => (intval($sra[6])+intval($sra[30])+intval($sra[54])),
            'g' => (intval($sra[7])+intval($sra[31])+intval($sra[55])),
            'h' => (intval($sra[8])+intval($sra[32])+intval($sra[56])),
            'i' => (intval($sra[9])+intval($sra[33])+intval($sra[57])),
            'j' => (intval($sra[10])+intval($sra[34])+intval($sra[58])),
            'k' => (intval($sra[11])+intval($sra[35])+intval($sra[59])),
            'l' => (intval($sra[12])+intval($sra[36])+intval($sra[60])),
            'm' => (intval($sra[13])+intval($sra[37])+intval($sra[61])),
            'n' => (intval($sra[14])+intval($sra[38])+intval($sra[62])),
            'o' => (intval($sra[15])+intval($sra[39])+intval($sra[63])),
            'p' => (intval($sra[16])+intval($sra[40])+intval($sra[64])),
            'q' => (intval($sra[17])+intval($sra[41])+intval($sra[65])),
            'r' => (intval($sra[18])+intval($sra[42])+intval($sra[66])),
            's' => (intval($sra[19])+intval($sra[43])+intval($sra[67])),
            't' => (intval($sra[20])+intval($sra[44])+intval($sra[68])),
            'u' => (intval($sra[21])+intval($sra[45])+intval($sra[69])),
            'v' => (intval($sra[22])+intval($sra[46])+intval($sra[70])),
            'w' => (intval($sra[23])+intval($sra[47])+intval($sra[71])),
            'x' => (intval($sra[24])+intval($sra[48])+intval($sra[72])),
        );
        arsort($sres);
        arsort($res);
        $nsres = $sres;
        $sres = array_slice($sres, 0, 5);
        $nres = array_slice($res, 0, 2);
        $aks = array_keys($nres);
        $organization = Organization::find(Session::get('organization_id'));
        if (!empty($organization->answers)){
            $descriptions = json_decode($organization->answers, true);
        } else {
            $descriptions = array(
                'ds' => '“D/S”s are attainers and achievers with an ability to persevere. They are more active than passive, but they possess a kind of calm sensitivity and steadiness that makes them good leaders. They seem to be people oriented but can easily be dominant and decisive when it comes to tasks and project planning. They strive to accomplish goals with fierce determination that comes from strong internal drive, but they could benefit from contemplative and conservative thinking as well as spending more time focusing on relationships. Biblical Examples: Daniel (Daniel 1-6), Job (Job 1:5, James 5:11), Martha (Luke 10:38-42)',
                'is' => '“I/S”s are influential counselors who love people, and it’s no surprise that people love them. They live to please and serve, and they tend to be good listeners. Looking good and encouraging others is important to them, as is following through and being obedient. They often lack in the area of organization and can be more concerned with the people involved than they are with the task at hand. However, they can be center stage or behind the scenes with equal effectiveness, and they shine when it comes to influencing and helping others. Biblical Examples: Barnabas (Acts 4, 9, 11-15), Elisha (1 Kings 19, 2 Kings 2-3), Nicodemus (John 3, 7, 19)',
                'si' => '“S/I”s are inspirational counselors who exhibit warmth and sensitivity. Tolerant and forgiving, they have many friends because they accept and represent others well. Their social nature and desire to be likable and flexible makes them inclined to be overly tolerant and non-confrontational. “S/I”s will benefit from being more task-oriented and paying more attention to detail. Kind and considerate, they include others and inspire them to follow. Words of affirmation go a long way with this personality type, and with the right motivation, they can be excellent team players. Biblical Examples: Mary Magdalene (Luke 7:36-47), Barnabas (Acts 4, 9, 11-15), Elisha (1 Kings 19, 2 Kings 2-13)',
                'ci' => '“C/I”s pay attention to the details. They tend to impress others by doing things right and stabilizing situations. Not considered aggressive or pushy, they enjoy both large and small crowds. Though they work well with people, they are sometimes too sensitive to what others think about them and their work. They could benefit from being more assertive and self motivated. Often excellent judges of character, they easily trust those who meet their standards. They are moved by genuine and enthusiastic approval as well as concise and logical explanations. Biblical Examples: Miriam (Exodus 15-21, Numbers 12:1-15), Ezra (Ezra 7, 8)',
                'di' => '“D/I”s are curious concluders who place emphasis on the bottom line and work hard to reach their goals. They are more determined than they are inspirational, yet their high expectations and standards for themselves and those around them typically causes them to make quite an impact, motivating others to follow them. They have an array of interests and can become distracted by taking on too many projects. They often need to focus, prioritize, and simply slow down. Because “D/I”s thrive on activity and forward motion, they like to accomplish tasks through a large number of people. Biblical Examples: Joshua (Joshua 1), Noah (Genesis 6-9), Sarah (Genesis 16, 1 Peter 3:6)',
                'id' => '“I/D”s are persuaders who are outgoing and energetic. They enjoy large groups and use their power of influence to attain respect and convince people to follow their lead. Sometimes they can be viewed as fidgety and nervous, but it comes from their need to be a part of challenges that have variety, freedom, and mobility. “I/D”s could benefit from learning to look before they leap and spending more time being studious and still. They make inspiring leaders and know how to get results from and through people. Biblical Examples: John the Baptist (Luke 3), Peter (Matthew 16 and 26, Acts 3), Rebekah (Genesis 24)',
                'sd' => '“S/D”s are quiet leaders who can be counted on to get the job done. They perform better in small groups and do not enjoy speaking in front of crowds. Though they can be soft- and hard-hearted at the same time, they enjoy close relationships with people, being careful not to dominate them. Challenges motivate them, especially ones that allow them to take a systematic approach. Because this personality style tends to be determined, persevering through time and struggles, they benefit from encouragement and positive relationships. Biblical Examples: Martha (Luke 10:38-42), Job (Job 1:5, James 5:11)',
                'cd' => '“C/D”s are cautious and determined designers who are consistently task-oriented and very aware of problems. Sometimes viewed as insensitive, they do care about individual people but have a difficult time showing it. They often feel they are the only ones who can do the job the way it needs to be done, but because of their administrative skills, they are able to bring plans for change and improvements to fruition. “C/D”s have a tendency to be serious and could benefit from being more optimistic and enthusiastic. Despite their natural drive to achieve, they should concentrate on developing healthy relationships and simply loving people. Biblical Examples: Bezealeel (Exodus 35:30-36, 8, 37:1-9), Jochebed (Exodus 1:22-2:4), Jethro (Exodus 2,18)',
                'dc' => '“D/C”s are challengers and can either be determined students or defiant critics. Being in charge is important to them, yet they care little about what others think as long as they get the job done. They have a great deal of foresight and examine every avenue to find the best solution; they prefer to work alone. Though they fear failure and the lack of influence, they are motivated by challenges and can often be excellent administrators. They can benefit from learning to relax and paying more attention to people. Biblical Examples: Malachi (Malachi 4), Nathan (2 Samuel 12:1-13), Nahum (Nahum 1-3)',
                'ic' => '“I/C”s are inspiring yet cautious assessors who are excellent communicators through the combination of concerned awareness and appreciation of people. They excel in determining ways to improve production. They tend to be impatient and critical, and they can also be overly persuasive and too consumed by the desire to win. “I/C”s like to work inside the box, and they could benefit from trying new things and caring less about what others think. This personality type often possesses a gift for teaching; they are generally dependable when it comes to paying attention to details and getting the job done. Biblical Examples: Miriam (Exodus 15-21), Ezra (Ezra 7-8), Shunammite Woman (2 Kings 4:8-37)',
                'sc' => '“S/C”s are diplomatic and steady, as well as detail-oriented. Stable and contemplative, they like to weigh the evidence and discover the facts to come to a logical conclusion. More deliberate, they prefer to take their time, especially when the decision involves others. Possible weaknesses include being highly sensitive and unable to handle criticism, and they also need to be aware of the way they treat others. Operating best in precise and cause-worthy projects, the “S/C” can be a peacemaker; this makes them a loyal team member and friend. Biblical Examples: Moses (Exodus 3, 4, 20, 32), John (John 19:26-27), Eliezer (Genesis 24)',
                'cs' => '“C/S”s are systematic and stable. They tend to do one thing at a time—and do it right. Reserved and cautious, they would rather work behind the scenes to stay on track; however, they seldom take risks or try new things and naturally dislike sudden changes in their environments. Precisionists to the letter, they painstakingly require accuracy and fear criticism, which they equate to failure. Diligent workers, their motivation comes from serving others. Biblical Examples: Esther (Esther 4), Zechariah (Luke 1), Joseph (Matthew 1:1-23)',
                'bygd' => 'A. Strive to listen to other people more attentively. B. Try to be less controlling and domineering. C. Develop a greater appreciation for the opinions, feelings and desires of others. D. Put more energy into personal relationships. E. Show your support for the other team members.',
                'bygi' => 'A. Weigh the pros and cons before making a decision; be less impulsive. B. Remember to help with tasks more. C. Exercise control over your actions, words and emotions. D. Focus more on details and facts. E. Remember to slow down your pace for other people. F. Talk less; listen more.',
                'bygs' => 'A. Consider how change is healthy. Try to change more willingly. B. Be more direct in your interactions. C. Focus on overall goals of your family or group rather than specific procedures. D. Deal with confrontation constructively. E. Develop more flexibility. F. Try to show more initiative.',
                'bygc' => 'A. Concentrate on doing the right things – not just doing things right. B. Be less critical of others’ ideas and methods. C. Respond more quickly to accomplish others goals. D. Strive to build relationships with other people and family members. E. Be more decisive. F. Focus less on facts and more on people.',
                'pad' => 'Dominant, Direct, Task oriented, Decisive, Organized, Outgoing, Outspoken',
                'pai' => 'Influential, Interested in people, Witty, Easygoing, Outgoing, People oriented',
                'pas' => 'Steady, Stability, Analytical, People oriented, Introverted',
                'pac' => 'Compliant, Competent, Task oriented, Goal oriented, Introverted',
                'sga' => 'administration',
                'sgda' => 'The gift of administration is the divine strength or ability to organize multiple tasks and groups of people to accomplish these tasks. Luke 14:28-30, Acts 6:1-7, I Cor. 12:28',
                'sgb' => 'apostleship',
                'sgdb' => 'The gift of apostleship is the divine strength or ability to pioneer new churches and ministries through planting, overseeing, and training. Acts 15:22-35, I Cor. 12:28, II Cor. 12:12, Gal 2:7-10, Ephesians 4:11-14',
                'sgc' => 'craftsmanship',
                'sgdc' => 'The gift of craftsmanship is the divine strength or ability to plan, build, and work with your hands in construction environments to accomplish multiple ministry applications. Exodus 30:22, 31:3-11, II Chronicles 34:9-13, Acts 18:2-3',
                'sgd' => 'discernment',
                'sgdd' => 'The gift of discernment is the divine strength or ability to spiritually identify falsehood and to distinguish between right and wrong motives and situations. Matt. 16:21-23, Acts 5:1-11, 16:16-18, I Cor. 12:10, I John 4:1-6',
                'sge' => 'evangelism',
                'sgde' => 'The gift of evangelism is the divine strength or ability to help non-Christians take the necessary steps to becoming a born again Christian. Acts 8:5-6, Acts 8:26-40, Acts 14:21, Acts 21:8, Ephesians 4:11-14',
                'sgf' => 'exhortation',
                'sgdf' => 'The gift of exhortation is the divine strength or ability to encourage others through the written or spoken word and Biblical truth. Acts 14:22, Romans 12:8, I Tim. 4:13, Heb 10:24-25',
                'sgg' => 'faith',
                'sgdg' => 'The gift of faith is the divine strength or ability to believe in God for unseen supernatural results in every arena of life. Acts 11:22-24, Rom 4:18-21, I Cor. 12:9, Hebrews 11',
                'sgh' => 'giving',
                'sgdh' => 'The gift of giving is the divine strength or ability to produce wealth and to give by tithes and offerings for the purpose of advancing the Kingdom of God on earth. Mark 12:41-44, Romans 12:8, II Cor. 8:1-7, 9:2-7 14',
                'sgi' => 'healing',
                'sgdi' => 'The gift of healing is the divine strength or ability to act as an intermediary in faith, prayer, & by the laying on of hands for the healing of physical and mental illnesses. Acts 3:1-10, Acts 9:32-35, Acts 28:7-10, I Cor. 12:9, 28',
                'sgj' => 'helps',
                'sgdj' => 'The gift of helps is the divine strength or ability to work in a supportive role for the accomplishment of tasks in Christian ministry. Mark 15:40-41, Acts 9:36, Romans 16:1- 2, I Cor 12:28',
                'sgk' => 'hospitality',
                'sgdk' => 'The gift of hospitality is the divine strength or ability to create warm, welcoming environ- ments for others in places such as your home, office, or church. Acts 16:14-15, Romans 12:13, Romans 16:23, Heb 13:1-2, I Peter 4:9',
                'sgl' => 'intercession',
                'sgdl' => 'The gift of intercession is the divine strength or ability to stand in the gap in prayer for someone, something, or someplace believing for profound results. Heb 7:25, Col 1:9-12, Col 4:12-13, Jas 5:14-16',
                'sgm' => 'knowledge',
                'sgdm' => 'The gift of knowledge is the divine strength or ability to bring clarity and to understand situations and circumstances often accompanied by a word from God. Acts 5:1-11, I Cor. 12:8, Col 2:2-3',
                'sgn' => 'leadership',
                'sgdn' => 'The gift of leadership is the divine strength or ability to influence people at their level while directing and focusing them on the big picture, vision, or idea. Romans 12:8, I Tim. 3:1-13, I Tim. 5:17, Hebrews 13:17',
                'sgo' => 'mercy',
                'sgdo' => 'The gift of mercy is the divine strength or ability to feel empathy and to care for those who are hurting in any way. Matt 9:35-36, Mark 9:41, Romans 12:8, I Thess. 5:14',
                'sgp' => 'miracles',
                'sgdp' => 'The gift of miracles is the divine strength or ability to alter the natural outcomes of life in a supernatural way through prayer, faith, and divine direction. Acts 9:36-42, 19:11-12, 20:7-12, Rom 15:18-19, I Cor. 12:10, 28',
                'sgq' => 'missionary',
                'sgdq' => 'The gift of missions is the divine strength or ability to reach others outside of your culture and nationality; while in most cases living in that culture or nation. Acts 8:4, Acts 13:2-3, Acts 22:21, Romans 10:15 15',
                'sgr' => 'music / worship',
                'sgdr' => 'The gift of music / worship is the divine strength or ability to sing, dance, or play an instrument primarily for the purpose of helping others worship God. Deut. 31:22, I Sam. 16:16, I Chronicles 16:41-42, II Chronicles 5:12-13, 34:12, Psalm 150',
                'sgs' => 'pastor / shepherd',
                'sgds' => 'The gift of pastor / shepherd is the divine strength or ability to care for the personal needs of others by nurturing and mending life issues. John 10:1-18, Eph 4:11-14, I Tim 3:1-7, I Peter 5:1-3',
                'sgt' => 'prophecy',
                'sgdt' => 'The gift of prophecy is the divine strength or ability to boldly speak and bring clarity to scriptural and doctrinal truth, in some cases foretelling God’s plan. Acts 2:37-40, Acts 7:51-53, Acts 26:24-29, I Cor. 14:1-4, I Thess. 1:5',
                'sgu' => 'service',
                'sgdu' => 'The gift of serving is the divine strength or ability to do small or great tasks in working for the overall good of the body of Christ. Acts 6:1-7, Romans 12:7, Galatians 6:10, II Tim. 1:16-18, Titus 3:14',
                'sgv' => 'teaching',
                'sgdv' => 'The gift of teaching is the divine strength or ability to study and learn from the Scriptures primarily to bring understanding and depth to other Christians. Acts 18:24-28, Acts 20:20-21, I Cor. 12:28, Eph 4:11-14 ',
                'sgw' => 'tongues (interpretation)',
                'sgdw' => 'The gift of tongues is the divine strength or ability to pray in a heavenly language to encourage your spirit and to commune with God. The gift of tongues is often accompanied by interpretation and should be used appropriately. Acts 2:1-13, I Cor. 12:10, 14:1-14',
                'sgx' => 'wisdom',
                'sgdx' => 'The gift of wisdom is the divine strength or ability to apply the truths of Scripture in a practical way, producing the fruitful outcome and character of Jesus Christ. Acts 6:3,10, I Cor. 2:6-13, I Cor. 12:8',
            );
        }

        $return = "
            <h2>Your personality type is <strong>'".ucwords($aks[0])."/".ucwords($aks[1])."'</strong></h2>
            <p>You are ".$descriptions['pa'.$aks[0]]."</p>
            <hr/>
            <p>".$errors."</p>
            <p>".$descriptions[$aks[0].$aks[1]]."</p>
            <h4>Ways You Can Better Yourself</h4>
            <p>".$descriptions['byg'.$aks[0]]."</p>
            <h2>Your spiritual gifts:</h2>
        ";

        foreach($sres as $key=>$val) {
            $return .= "<h3>".$descriptions['sg'.$key]."</h3>";
            $return .= "<p>".$descriptions['sgd'.$key]."</p>";
            $return .= "<hr/>";
        }

        $nmfw = array();
        $mfw = array_slice($nsres, 0, 5);
        foreach($mfw as $key => $yfw) {
            $nmfw[] = array('score'=>$yfw, 'title'=>$descriptions['sg'.$key]);
        }
        return $return;
    }
}
