<?php 

categories




























































































































































































































































INSERT INTO `mcode_category_mcode_feature` VALUES (750, 15);





// delete
\DB::table('institution_contact_student') // the pivot table
            ->whereIn('student_id', $studentIds)
            ->where('type', $contactType)
            ->delete();

// add
foreach ($students as $student) {
    $student->institutionContacts()->attach([$contactId => ['type' => $contactType]]);
 }









mcode_category_mcode_feature



$pivot = $mcodeFeature->categories()->withPivot(['id', 'mcode_feature_id', 'mcode_category_id', 'mcode'])->wherePivot('type',1) ->first()->pivot;




$mcodeFeature->categories()->sync($request->input('categories', []));




Code
$f = McodeFeature::find('M10002')->categories()->sync(16);
McodeFeature::where('M10004')->categories()->sync(16);
McodeFeature::find('M10005')->categories()->sync(16);
McodeFeature::find('M10006')->categories()->sync(16);
McodeFeature::find('M10011')->categories()->sync(7);
McodeFeature::find('M10012')->categories()->sync(7);
McodeFeature::find('M10013')->categories()->sync(7);
McodeFeature::find('M10014')->categories()->sync(7);
McodeFeature::find('M10015')->categories()->sync(7);
McodeFeature::find('M10016')->categories()->sync(7);
McodeFeature::find('M10017')->categories()->sync(7);
McodeFeature::find('M10018')->categories()->sync(15);
McodeFeature::find('M10019')->categories()->sync(15);
McodeFeature::find('M10020')->categories()->sync(15);
McodeFeature::find('M10021')->categories()->sync(15);
McodeFeature::find('M10022')->categories()->sync(15);
McodeFeature::find('M10023')->categories()->sync(15);
McodeFeature::find('M10026')->categories()->sync(15);
McodeFeature::find('M10027')->categories()->sync(15);
McodeFeature::find('M10028')->categories()->sync(15);
McodeFeature::find('M10029')->categories()->sync(15);
McodeFeature::find('M10031')->categories()->sync(15);
McodeFeature::find('M10033')->categories()->sync(15);
McodeFeature::find('M10034')->categories()->sync(15);
McodeFeature::find('M10035')->categories()->sync(15);
McodeFeature::find('M10036')->categories()->sync(15);
McodeFeature::find('M10037')->categories()->sync(15);
McodeFeature::find('M10038')->categories()->sync(15);
McodeFeature::find('M10039')->categories()->sync(15);
McodeFeature::find('M10040')->categories()->sync(15);
McodeFeature::find('M10041')->categories()->sync(15);
McodeFeature::find('M10042')->categories()->sync(15);
McodeFeature::find('M10043')->categories()->sync(15);
McodeFeature::find('M10044')->categories()->sync(15);
McodeFeature::find('M10045')->categories()->sync(15);
McodeFeature::find('M10046')->categories()->sync(15);
McodeFeature::find('M10047')->categories()->sync(15);
McodeFeature::find('M10048')->categories()->sync(15);
McodeFeature::find('M10049')->categories()->sync(15);
McodeFeature::find('M10050')->categories()->sync(15);
McodeFeature::find('M10051')->categories()->sync(15);
McodeFeature::find('M10054')->categories()->sync(15);
McodeFeature::find('M10055')->categories()->sync(15);
McodeFeature::find('M10056')->categories()->sync(15);
McodeFeature::find('M10057')->categories()->sync(15);
McodeFeature::find('M10058')->categories()->sync(15);
McodeFeature::find('M10059')->categories()->sync(15);
McodeFeature::find('M10060')->categories()->sync(15);
McodeFeature::find('M10061')->categories()->sync(15);
McodeFeature::find('M10065')->categories()->sync(15);
McodeFeature::find('M10066')->categories()->sync(15);
McodeFeature::find('M10067')->categories()->sync(15);
McodeFeature::find('M10068')->categories()->sync(15);
McodeFeature::find('M10069')->categories()->sync(15);
McodeFeature::find('M10070')->categories()->sync(15);
McodeFeature::find('M10071')->categories()->sync(15);
McodeFeature::find('M10072')->categories()->sync(15);
McodeFeature::find('M10073')->categories()->sync(15);
McodeFeature::find('M10076')->categories()->sync(15);
McodeFeature::find('M10077')->categories()->sync(15);
McodeFeature::find('M10078')->categories()->sync(15);
McodeFeature::find('M10079')->categories()->sync(15);
McodeFeature::find('M10082')->categories()->sync(15);
McodeFeature::find('M10083')->categories()->sync(15);
McodeFeature::find('M10095')->categories()->sync(15);
McodeFeature::find('M10101')->categories()->sync(15);
McodeFeature::find('M10103')->categories()->sync(15);
McodeFeature::find('M10104')->categories()->sync(15);
McodeFeature::find('M10105')->categories()->sync(15);
McodeFeature::find('M10106')->categories()->sync(15);
McodeFeature::find('M10107')->categories()->sync(15);
McodeFeature::find('M10108')->categories()->sync(15);
McodeFeature::find('M10109')->categories()->sync(15);
McodeFeature::find('M10110')->categories()->sync(15);
McodeFeature::find('M10122')->categories()->sync(10);
McodeFeature::find('M10123')->categories()->sync(10);
McodeFeature::find('M10124')->categories()->sync(7);
McodeFeature::find('M10125')->categories()->sync(7);
McodeFeature::find('M10126')->categories()->sync(4);
McodeFeature::find('M10127')->categories()->sync(4);
McodeFeature::find('M10128')->categories()->sync(4);
McodeFeature::find('M10129')->categories()->sync(4);
McodeFeature::find('M10130')->categories()->sync(4);
McodeFeature::find('M10131')->categories()->sync(4);
McodeFeature::find('M10132')->categories()->sync(4);
McodeFeature::find('M10133')->categories()->sync(4);
McodeFeature::find('M10134')->categories()->sync(4);
McodeFeature::find('M10135')->categories()->sync(4);
McodeFeature::find('M10136')->categories()->sync(11);
McodeFeature::find('M10137')->categories()->sync(11);
McodeFeature::find('M10138')->categories()->sync(12);
McodeFeature::find('M10139')->categories()->sync(12);
McodeFeature::find('M10140')->categories()->sync(18);
McodeFeature::find('M10141')->categories()->sync(18);
McodeFeature::find('M10142')->categories()->sync(18);
McodeFeature::find('M10143')->categories()->sync(18);
McodeFeature::find('M10144')->categories()->sync(14);
McodeFeature::find('M10145')->categories()->sync(14);
McodeFeature::find('M10146')->categories()->sync(14);
McodeFeature::find('M10147')->categories()->sync(14);
McodeFeature::find('M10148')->categories()->sync(14);
McodeFeature::find('M10149')->categories()->sync(14);
McodeFeature::find('M10150')->categories()->sync(14);
McodeFeature::find('M10151')->categories()->sync(14);
McodeFeature::find('M10152')->categories()->sync(14);
McodeFeature::find('M10153')->categories()->sync(7);
McodeFeature::find('M10154')->categories()->sync(7);
McodeFeature::find('M10157')->categories()->sync(11);
McodeFeature::find('M10159')->categories()->sync(12);
McodeFeature::find('M10194')->categories()->sync(18);
McodeFeature::find('M10195')->categories()->sync(18);
McodeFeature::find('M10196')->categories()->sync(18);
McodeFeature::find('M10197')->categories()->sync(18);
McodeFeature::find('M10198')->categories()->sync(4);
McodeFeature::find('M10199')->categories()->sync(4);
McodeFeature::find('M10220')->categories()->sync(4);
McodeFeature::find('M10234')->categories()->sync(15);
McodeFeature::find('M10235')->categories()->sync(15);
McodeFeature::find('M10236')->categories()->sync(15);
McodeFeature::find('M10237')->categories()->sync(15);
McodeFeature::find('M10238')->categories()->sync(15);
McodeFeature::find('M10239')->categories()->sync(15);
McodeFeature::find('M10240')->categories()->sync(15);
McodeFeature::find('M10241')->categories()->sync(15);
McodeFeature::find('M10248')->categories()->sync(15);
McodeFeature::find('M10249')->categories()->sync(15);
McodeFeature::find('M10274')->categories()->sync(15);
McodeFeature::find('M10275')->categories()->sync(15);
McodeFeature::find('M10280')->categories()->sync(15);
McodeFeature::find('M10281')->categories()->sync(15);
McodeFeature::find('M10282')->categories()->sync(15);
McodeFeature::find('M10283')->categories()->sync(15);
McodeFeature::find('M10284')->categories()->sync(15);
McodeFeature::find('M10285')->categories()->sync(15);
McodeFeature::find('M10286')->categories()->sync(15);
McodeFeature::find('M10287')->categories()->sync(15);
McodeFeature::find('M10288')->categories()->sync(15);
McodeFeature::find('M10289')->categories()->sync(15);
McodeFeature::find('M10290')->categories()->sync(15);
McodeFeature::find('M10291')->categories()->sync(15);
McodeFeature::find('M10292')->categories()->sync(15);
McodeFeature::find('M10293')->categories()->sync(15);
McodeFeature::find('M10294')->categories()->sync(15);
McodeFeature::find('M10295')->categories()->sync(15);
McodeFeature::find('M10296')->categories()->sync(12);
McodeFeature::find('M10319')->categories()->sync(4);
McodeFeature::find('M10320')->categories()->sync(4);
McodeFeature::find('M10321')->categories()->sync(4);
McodeFeature::find('M10322')->categories()->sync(4);
McodeFeature::find('M10323')->categories()->sync(4);
McodeFeature::find('M10343')->categories()->sync(4);
McodeFeature::find('M10351')->categories()->sync(15);
McodeFeature::find('M10352')->categories()->sync(7);
McodeFeature::find('M10353')->categories()->sync(15);
McodeFeature::find('M10354')->categories()->sync(15);
McodeFeature::find('M10355')->categories()->sync(15);
McodeFeature::find('M10356')->categories()->sync(15);
McodeFeature::find('M10357')->categories()->sync(15);
McodeFeature::find('M10358')->categories()->sync(15);
McodeFeature::find('M10359')->categories()->sync(15);
McodeFeature::find('M10360')->categories()->sync(15);
McodeFeature::find('M10361')->categories()->sync(15);
McodeFeature::find('M10375')->categories()->sync(19);
McodeFeature::find('M10376')->categories()->sync(19);
McodeFeature::find('M10377')->categories()->sync(19);
McodeFeature::find('M10378')->categories()->sync(19);
McodeFeature::find('M10379')->categories()->sync(19);
McodeFeature::find('M10380')->categories()->sync(19);
McodeFeature::find('M10381')->categories()->sync(19);
McodeFeature::find('M10382')->categories()->sync(19);
McodeFeature::find('M10383')->categories()->sync(19);
McodeFeature::find('M10384')->categories()->sync(19);
McodeFeature::find('M10385')->categories()->sync(19);
McodeFeature::find('M10386')->categories()->sync(19);
McodeFeature::find('M10387')->categories()->sync(13);
McodeFeature::find('M10388')->categories()->sync(13);
McodeFeature::find('M10389')->categories()->sync(13);
McodeFeature::find('M10390')->categories()->sync(13);
McodeFeature::find('M10391')->categories()->sync(13);
McodeFeature::find('M10392')->categories()->sync(13);
McodeFeature::find('M10393')->categories()->sync(13);
McodeFeature::find('M10394')->categories()->sync(13);
McodeFeature::find('M10395')->categories()->sync(13);
McodeFeature::find('M10396')->categories()->sync(13);
McodeFeature::find('M10397')->categories()->sync(13);
McodeFeature::find('M10398')->categories()->sync(13);
McodeFeature::find('M10399')->categories()->sync(13);
McodeFeature::find('M10400')->categories()->sync(13);
McodeFeature::find('M10401')->categories()->sync(13);
McodeFeature::find('M10402')->categories()->sync(13);
McodeFeature::find('M10403')->categories()->sync(7);
McodeFeature::find('M10404')->categories()->sync(7);
McodeFeature::find('M10405')->categories()->sync(4);
McodeFeature::find('M10406')->categories()->sync(13);
McodeFeature::find('M10407')->categories()->sync(13);
McodeFeature::find('M10408')->categories()->sync(13);
McodeFeature::find('M10409')->categories()->sync(13);
McodeFeature::find('M10417')->categories()->sync(15);
McodeFeature::find('M10418')->categories()->sync(8);
McodeFeature::find('M10419')->categories()->sync(8);
McodeFeature::find('M10420')->categories()->sync(8);
McodeFeature::find('M10421')->categories()->sync(8);
McodeFeature::find('M10422')->categories()->sync(8);
McodeFeature::find('M10423')->categories()->sync(8);
McodeFeature::find('M10424')->categories()->sync(8);
McodeFeature::find('M10425')->categories()->sync(16);
McodeFeature::find('M10426')->categories()->sync(4);
McodeFeature::find('M10431')->categories()->sync(16);
McodeFeature::find('M10432')->categories()->sync(16);
McodeFeature::find('M10433')->categories()->sync(7);
McodeFeature::find('M10439')->categories()->sync(4);
McodeFeature::find('M10441')->categories()->sync(8);
McodeFeature::find('M10442')->categories()->sync(8);
McodeFeature::find('M10443')->categories()->sync(8);
McodeFeature::find('M10444')->categories()->sync(8);
McodeFeature::find('M10445')->categories()->sync(15);
McodeFeature::find('M10446')->categories()->sync(15);
McodeFeature::find('M10458')->categories()->sync(15);
McodeFeature::find('M10459')->categories()->sync(15);
McodeFeature::find('M10460')->categories()->sync(8);
McodeFeature::find('M10461')->categories()->sync(8);
McodeFeature::find('M10462')->categories()->sync(8);
McodeFeature::find('M10463')->categories()->sync(8);
McodeFeature::find('M10464')->categories()->sync(8);
McodeFeature::find('M10465')->categories()->sync(8);
McodeFeature::find('M10466')->categories()->sync(8);
McodeFeature::find('M10467')->categories()->sync(13);
McodeFeature::find('M10469')->categories()->sync(8);
McodeFeature::find('M10470')->categories()->sync(15);
McodeFeature::find('M10471')->categories()->sync(8);
McodeFeature::find('M10472')->categories()->sync(8);
McodeFeature::find('M10475')->categories()->sync(15);
McodeFeature::find('M10476')->categories()->sync(15);
McodeFeature::find('M10477')->categories()->sync(15);
McodeFeature::find('M10478')->categories()->sync(15);
McodeFeature::find('M10479')->categories()->sync(15);
McodeFeature::find('M10480')->categories()->sync(15);
McodeFeature::find('M10481')->categories()->sync(15);
McodeFeature::find('M10482')->categories()->sync(15);
McodeFeature::find('M10483')->categories()->sync(15);
McodeFeature::find('M10484')->categories()->sync(15);
McodeFeature::find('M10485')->categories()->sync(15);
McodeFeature::find('M10486')->categories()->sync(15);
McodeFeature::find('M10487')->categories()->sync(15);
McodeFeature::find('M10488')->categories()->sync(15);
McodeFeature::find('M10489')->categories()->sync(15);
McodeFeature::find('M10490')->categories()->sync(15);
McodeFeature::find('M10491')->categories()->sync(15);
McodeFeature::find('M10492')->categories()->sync(15);
McodeFeature::find('M10493')->categories()->sync(15);
McodeFeature::find('M10494')->categories()->sync(15);
McodeFeature::find('M10495')->categories()->sync(1);
McodeFeature::find('M10497')->categories()->sync(1);
McodeFeature::find('M10498')->categories()->sync(1);
McodeFeature::find('M10500')->categories()->sync(1);
McodeFeature::find('M10501')->categories()->sync(1);
McodeFeature::find('M10502')->categories()->sync(1);
McodeFeature::find('M10514')->categories()->sync(8);
McodeFeature::find('M10515')->categories()->sync(8);
McodeFeature::find('M10520')->categories()->sync(15);
McodeFeature::find('M10521')->categories()->sync(15);
McodeFeature::find('M10522')->categories()->sync(18);
McodeFeature::find('M10523')->categories()->sync(18);
McodeFeature::find('M10524')->categories()->sync(18);
McodeFeature::find('M10527')->categories()->sync(9);
McodeFeature::find('M10528')->categories()->sync(9);
McodeFeature::find('M10535')->categories()->sync(15);
McodeFeature::find('M10536')->categories()->sync(15);
McodeFeature::find('M10537')->categories()->sync(15);
McodeFeature::find('M10538')->categories()->sync(15);
McodeFeature::find('M10544')->categories()->sync(15);
McodeFeature::find('M10545')->categories()->sync(15);
McodeFeature::find('M10546')->categories()->sync(15);
McodeFeature::find('M10547')->categories()->sync(15);
McodeFeature::find('M10548')->categories()->sync(15);
McodeFeature::find('M10549')->categories()->sync(15);
McodeFeature::find('M10550')->categories()->sync(15);
McodeFeature::find('M10552')->categories()->sync(8);
McodeFeature::find('M10553')->categories()->sync([8]);





McodeFeature::find(1)->models()->sync([17,14,34,36,31,33,32,12,12,1]);
McodeFeature::find(2)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(3)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(4)->models()->sync([30,35,17,14,34,36,31,33;32;12;1]);
McodeFeature::find(5)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(6)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(7)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(8)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(9)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(10)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(11)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(12)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(13)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(14)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(15)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(16)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(17)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(18)->models()->sync([17,14,34,36,31,33,32,12,1]);

McodeFeature::find(19)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(20)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(21)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(22)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(23)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(24)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(25)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(26)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(27)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(28)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(29)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(30)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(31)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(32)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(33)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(34)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(35)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(36)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(37)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(38)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(39)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(40)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(41)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(42)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(43)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(44)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(45)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(46)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(47)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(48)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(49)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(50)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(51)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(52)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(53)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(54)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(55)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(56)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(57)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(58)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(59)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(60)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(61)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(62)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(63)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(64)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(65)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(66)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(67)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(68)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(69)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(70)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(71)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(72)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(73)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(74)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(75)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(76)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(77)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(78)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(79)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(80)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(81)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(82)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(83)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(84)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(85)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(86)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(87)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(88)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(89)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(90)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(91)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(92)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(93)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(94)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(95)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(96)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(97)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(98)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(99)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(100)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(101)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(102)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(103)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(104)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(105)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(106)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(107)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(108)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(109)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(110)->models()->sync([30,35,17,14,36,31,33,32,12]);
McodeFeature::find(111)->models()->sync([35,31,32]);
McodeFeature::find(112)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(113)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(114)->models()->sync([35,17,14,31,32]);
McodeFeature::find(115)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(116)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(117)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(118)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(119)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(120)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(121)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(122)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(123)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(124)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(125)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(126)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(127)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(128)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(129)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(130)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(131)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(132)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(133)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(134)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(135)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(136)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(137)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(138)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(139)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(140)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(141)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(142)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(143)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(144)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(145)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(146)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(147)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(148)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(149)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(150)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(151)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(152)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(153)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(154)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(155)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(156)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(157)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(158)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(159)->models()->sync([35,17,14,31,32,12]);
McodeFeature::find(160)->models()->sync([35,17,14,31,32]);
McodeFeature::find(161)->models()->sync([35,17,14,31,32]);
McodeFeature::find(162)->models()->sync([35,17,14,31,32]);
McodeFeature::find(163)->models()->sync([35,17,14,31,32]);
McodeFeature::find(164)->models()->sync([35,17,14,31,32]);
McodeFeature::find(165)->models()->sync([35,17,14,31,32]);
McodeFeature::find(166)->models()->sync([35,17,14,31,32]);
McodeFeature::find(167)->models()->sync([35,17,14,31,32]);
McodeFeature::find(168)->models()->sync([35,17,14,31,32]);
McodeFeature::find(169)->models()->sync([35,17,14,31,32]);
McodeFeature::find(170)->models()->sync([35,17,14,31,32]);
McodeFeature::find(171)->models()->sync([35,17,14,31,32]);
McodeFeature::find(172)->models()->sync([35,17,14,31,32]);
McodeFeature::find(173)->models()->sync([35,17,14,31,32]);
McodeFeature::find(174)->models()->sync([35,17,14,31,32]);
McodeFeature::find(175)->models()->sync([35,17,14,31,32]);
McodeFeature::find(176)->models()->sync([30,17,14,36,33,1,12]);
McodeFeature::find(177)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(178)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(179)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(180)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(181)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(182)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(183)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(184)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(185)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(186)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(187)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(188)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(189)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(190)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(191)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(192)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(193)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(194)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(195)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(196)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(197)->models()->sync([30,35,17,14,36,31,33,32,12]);
McodeFeature::find(198)->models()->sync([30,35,17,14,36,31,33,32,12]);
McodeFeature::find(199)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(200)->models()->sync([30,17,14,36,33,12,1]);
McodeFeature::find(201)->models()->sync([]);
McodeFeature::find(202)->models()->sync([]);
McodeFeature::find(203)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(204)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(205)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(206)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(207)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(208)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(209)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(210)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(211)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(212)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(213)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(214)->models()->sync([30,17,14,34,36,33,12,1]);
McodeFeature::find(215)->models()->sync([30,17,14,34,36,33,12,1]);
McodeFeature::find(216)->models()->sync([30,17,14,34,36,33,12,1]);
McodeFeature::find(217)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(218)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(219)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(220)->models()->sync([30,35,17,14,36,31,33,32]);
McodeFeature::find(221)->models()->sync([30,17,14,36,33,12]);
McodeFeature::find(222)->models()->sync([30,17,14,36,33,12]);
McodeFeature::find(223)->models()->sync([30,35,17,14]);
McodeFeature::find(224)->models()->sync([30,35,17,14]);
McodeFeature::find(225)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(226)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(227)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(228)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(229)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(230)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(231)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(232)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(233)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(234)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(235)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(236)->models()->sync([30,35,17,14,34,36,31,33,32,1]);
McodeFeature::find(237)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(238)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(239)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(240)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(241)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(242)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(243)->models()->sync([30,35,17]);
McodeFeature::find(244)->models()->sync([30,35,17]);
McodeFeature::find(245)->models()->sync([30,17,14,36,33,12]);
McodeFeature::find(246)->models()->sync([35,31,32]);
McodeFeature::find(247)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(248)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(249)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(250)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(251)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(252)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(253)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(254)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(255)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(256)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(257)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(258)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(259)->models()->sync([]);
McodeFeature::find(260)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(261)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(262)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(263)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(264)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(265)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(266)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(267)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(268)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(269)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(270)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(271)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(272)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(273)->models()->sync([17,14,34,36,31,33,32,12,1]);
McodeFeature::find(274)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(275)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(276)->models()->sync([17,14,36,31,33,32,12,1]);
McodeFeature::find(277)->models()->sync([17,14,36,31,33,32,12,1]);
McodeFeature::find(278)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(279)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(280)->models()->sync([17,14,31,32,23]);
McodeFeature::find(281)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(282)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(283)->models()->sync([30,35,17]);
McodeFeature::find(284)->models()->sync([30,35,17]);
McodeFeature::find(285)->models()->sync([30,35,17]);
McodeFeature::find(286)->models()->sync([30,35,17]);
McodeFeature::find(287)->models()->sync([30,35,17]);
McodeFeature::find(288)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(289)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(290)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(291)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(292)->models()->sync([35]);
McodeFeature::find(293)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(294)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(295)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(296)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(297)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(298)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(299)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(300)->models()->sync([30,35,17,14,34,36,31,33,32]);
McodeFeature::find(301)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(302)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(303)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(304)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(305)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(306)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(307)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(308)->models()->sync([17,1]);
McodeFeature::find(309)->models()->sync([17,1]);
McodeFeature::find(310)->models()->sync([17,1]);
McodeFeature::find(311)->models()->sync([17,1]);
McodeFeature::find(312)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(313)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(314)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(315)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(316)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(317)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(318)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(319)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(320)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(321)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(322)->models()->sync([30,17,12,1]);
McodeFeature::find(323)->models()->sync([30,17,12,1]);
McodeFeature::find(324)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(325)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(326)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(327)->models()->sync([30,35,17,14,34,36,31,33,32,12,1]);
McodeFeature::find(328)->models()->sync([17,14,36,31,33,32,12,1]);
McodeFeature::find(329)->models()->sync([1]);
McodeFeature::find(330)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(331)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(332)->models()->sync([30,35,17,14,36,31,33,32,12,1]);
McodeFeature::find(333)->models()->sync([12]);
McodeFeature::find(334)->models()->sync([12]);
McodeFeature::find(335)->models()->sync([12]);
McodeFeature::find(336)->models()->sync([12]);
McodeFeature::find(337)->models()->sync([12]);
McodeFeature::find(338)->models()->sync([12]);
McodeFeature::find(339)->models()->sync([12]);
McodeFeature::find(340)->models()->sync([12]);
McodeFeature::find(341)->models()->sync([12]);
McodeFeature::find(342)->models()->sync([12]);
McodeFeature::find(343)->models()->sync([12]);
McodeFeature::find(344)->models()->sync([12]);
McodeFeature::find(345)->models()->sync([12]);
McodeFeature::find(346)->models()->sync([12]);
McodeFeature::find(347)->models()->sync([12]);
McodeFeature::find(348)->models()->sync([12]);
McodeFeature::find(349)->models()->sync([]);
McodeFeature::find(350)->models()->sync([]);
McodeFeature::find(351)->models()->sync([]);
McodeFeature::find(352)->models()->sync([]);
McodeFeature::find(353)->models()->sync([1]);
McodeFeature::find(354)->models()->sync([1]);
McodeFeature::find(355)->models()->sync([]);
McodeFeature::find(356)->models()->sync([1]);
McodeFeature::find(357)->models()->sync([]);
McodeFeature::find(358)->models()->sync([]);
McodeFeature::find(359)->models()->sync([]);
McodeFeature::find(360)->models()->sync([]);
McodeFeature::find(361)->models()->sync([]);
McodeFeature::find(362)->models()->sync([]);
McodeFeature::find(363)->models()->sync([1]);
McodeFeature::find(364)->models()->sync([1]);
McodeFeature::find(365)->models()->sync([30,17,14,36,31,33,32,12,1]);
McodeFeature::find(366)->models()->sync([30,17,14,36,31,33,32,12,1]);
McodeFeature::find(367)->models()->sync([]);
McodeFeature::find(368)->models()->sync([]);
McodeFeature::find(369)->models()->sync([]);
McodeFeature::find(370)->models()->sync([]);
McodeFeature::find(371)->models()->sync([]);
McodeFeature::find(372)->models()->sync([]);
McodeFeature::find(373)->models()->sync([]);
McodeFeature::find(374)->models()->sync([]);
McodeFeature::find(375)->models()->sync([]);
McodeFeature::find(376)->models()->sync([]);
McodeFeature::find(377)->models()->sync([]);
McodeFeature::find(378)->models()->sync([]);
McodeFeature::find(379)->models()->sync([]);
McodeFeature::find(380)->models()->sync([]);
McodeFeature::find(381)->models()->sync([]);
McodeFeature::find(382)->models()->sync([]);
McodeFeature::find(383)->models()->sync([]);
McodeFeature::find(384)->models()->sync([]);
McodeFeature::find(385)->models()->sync([]);
McodeFeature::find(386)->models()->sync([]);
McodeFeature::find(387)->models()->sync([]);
McodeFeature::find(388)->models()->sync([]);
McodeFeature::find(389)->models()->sync([]);
McodeFeature::find(390)->models()->sync([1]);
McodeFeature::find(391)->models()->sync([1]);
McodeFeature::find(392)->models()->sync([1]);
McodeFeature::find(393)->models()->sync([1]);
McodeFeature::find(394)->models()->sync([1]);
McodeFeature::find(395)->models()->sync([17,14,23,19]);
McodeFeature::find(396)->models()->sync([]);
McodeFeature::find(397)->models()->sync([]);
McodeFeature::find(398)->models()->sync([]);
McodeFeature::find(399)->models()->sync([]);
McodeFeature::find(400)->models()->sync([37,38]);
McodeFeature::find(401)->models()->sync([37,38]);
McodeFeature::find(402)->models()->sync([1]);
McodeFeature::find(403)->models()->sync([37,38,1]);
McodeFeature::find(404)->models()->sync([37,38,1]);
McodeFeature::find(405)->models()->sync([37,38,1]);
McodeFeature::find(406)->models()->sync([37,38,1]);
McodeFeature::find(407)->models()->sync([12]);
McodeFeature::find(408)->models()->sync([12]);
McodeFeature::find(409)->models()->sync([12]);
McodeFeature::find(410)->models()->sync([12]);
McodeFeature::find(411)->models()->sync([12]);
McodeFeature::find(412)->models()->sync([12]);
McodeFeature::find(413)->models()->sync([12]);
McodeFeature::find(414)->models()->sync([12]);
McodeFeature::find(415)->models()->sync([12]);
McodeFeature::find(416)->models()->sync([12]);
McodeFeature::find(417)->models()->sync([12]);
McodeFeature::find(418)->models()->sync([12]);
McodeFeature::find(419)->models()->sync([12]);
McodeFeature::find(420)->models()->sync([12]);
McodeFeature::find(421)->models()->sync([12]);
McodeFeature::find(422)->models()->sync([12]);
