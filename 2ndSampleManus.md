ABSTRACT  
ONDOS, MARIEL U. Davao Del Sur State College, Institute of 
Computing Engineering and Technology, Matti, Digos City. June 2025 
“ANDROID-BASED 
GUARD 
MONITORING AND SITE 
SURVEILLANCE SYSTEM Undergraduate Capstone Project.  
Adviser: DOMINGO V. ORIGINES JR., IT.D.  
Android-based system for site surveillance and guard monitoring is 
intended to improve security operations and guarantee security staff 
responsibility. In order to increase the effectiveness and transparency of 
security operations throughout monitored locations, the system integrated 
mobile technologies with real-time data collection. The system used the 
Agile Development Model of the Application. Among its primary features are 
monitoring via QR codes and a timestamp camera that enables guards to 
take and submit pictures. The software also makes it easier for guards to 
report incidents, enabling them to document any anomalies they come 
across while on patrol. Assessed using ISO 25010 Software Quality 
Framework, the system's user-friendly interface and mobility make it a 
viable option for modern security management requirements.  Fourteen 
(14) evaluators assessed the system using a standardized rating scale. The 
admin, advisory committee, and IT expert scored 4.7 for generate QR code. 
ii 
The user module earned 4.8 for capturing real-time incidents by location, 
and reports on visited sites. Overall, the system showed strong functional 
suitability with a mean score of 4.5, the performance efficiency and 
compatibility earned 4.3, and a slightly lower usability and reliability rating 
of 4.2. Key recommendations include adding an emailed One-Time 
Password (OTP) as an authentication method to ensure data security. 
Provide Offline functionality, provide real-time verification by allowing the 
admin to validate reported incidents as they occur, and ensure cross 
platform compatibility, as application works seamlessly on both android and 
IOS devices. The system supports Sustainable Development Goal (SDG) 9: 
Innovation, Industry and Infrastructure. It will be implemented in the Davao 
del sur State College General Services Office (GSO). Improve monitoring 
and overall performance to ensure smooth operation. 
Keywords: Guard, site surveillance, Android-Based, Monitoring,  
QR code  
SDG: 9 Innovation, Industry and Infrastructure
ANDROID-BASED GUARD MONITORING AND SITE 
SURVEILLANCE SYSTEM 
??????????? 
CAPSTONE PROJECT SUBMITTED TO THE FACULTY OF THE 
INSTITUTE  OF  COMPUTING,  ENGINEERING  AND  
TECHNOLOGY (ICET), DAVAO DEL SUR STATE 
COLLEGE, MATTI, DIGOS CITY, DAVAO  
DEL SUR.IN PARTIAL FULFILLMENT  
OF  THE   REQUIREMENTS  
FORTHE DEGREE OF 
BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY 
JUNE 2025 
APPROVAL SHEET 
This capstone project entitled “ANDROID-BASED GUARD 
MONITORING AND SITE SURVEILLANCE SYSTEM” prepared and 
submitted by ????????????? in partial fulfillment of the requirements for 
the degree of Bachelor of Science in Information Technology, is hereby 
accepted. 
EDUARDO F. AQUINO, MSME 
Member 
_____________________ 
FELOMINO ALBA, IT. D 
Member 
_____________________ 
Date Signed  
Date Signed 
DOMINGO V. ORIGINES JR., IT.D    RHEA MAE L. PERITO, MSIS 
Adviser   
_____________________ 
Date Signed  
Chairperson 
_____________________ 
Date Signed 
Accepted and approved in partial fulfillment of the requirements for 
the degree of the Bachelor of Science in Information Technology (BSIT). 
DOMINGO V. ORIGINES JR., IT.D 
Chairperson, Computing Department 
Date Signed 
EDUARDO F. AQUINO, RPAE, MSME 
Dean, Institute of Computing, Engineering Technology 
_____________________ 
Date Signed
iv 
ACKNOWLEDGMENT 
The researcher would like to express gratitude to everyone who 
contributed their expertise and insights to the successful completion of this 
study. Nonetheless, the investigator would like to sincerely thank the 
following individuals. To the President of Davao del Sur State College, Dr. 
Augie E. Fuentes, and Engr. Eduardo S. Aquino, dean of the Institute of 
Computing, Engineering & Technology, for granting permission to conduct 
this study. Without their committed research efforts, this study would not 
have been able to succeed. 
To Prof. Domingo V. Origines Jr., the adviser, for her guidance and 
support during this process. Her research skills and competence, along with 
her consistent positive feedback, made this study a success. Her expertise 
and politeness prevented the researcher from making many mistakes during 
the editing and revision stages. 
The researcher would also like to thank the chairperson, Rhea Mae 
L. Perito, and the panel members, Engr. Eduardo F. Aquino, Prof. Felomino 
P. Alba, Karl Vincent A. Surdella, and Prof. Meliza P. Alo for their valuable 
help in completing this study. Since the beginning of the capstone project, 
their support, knowledge, and guidance have been a big help. The
v 
researcher is also grateful to all the participants who answered the 
questions honestly. Without their cooperation, this study would not have 
been possible. 
vi 
vii 
TABLE OF CONTENTS 
 
 
PRELIMINARY PAGES PAGE 
  
ABSTRACT i 
TITLE PAGE iii 
APPROVAL SHEET iv 
ACKNOWLEDGEMENT v 
TABLE OF CONTENTS vii 
LIST OF FIGURES x 
LIST OF TABLES xiii 
LIST OF APPENDICES xiv 
   
CHAPTER I THE PROBLEM AND ITS BACKGROUND  
 Introduction 1 
 Objectives of the Study 4 
 Significance of the Study 5 
 Scope and Limitations of the Study 6 
 Definition of Terms 7 
   
CHAPTER II RELATED LITERATURE AND STUDIES  
 Related Literature 10 
               Literature Map of the Study 10 
   Guard Monitoring System 12 
   Studies that utilize QR Code 12 
   Site Surveillance System 13 
   Studies that utilize Timestamp Camera 13 
   Studies that utilize Real-Time Incident 14 
   Mobile Application for Guard 14 
   Android-Based Guard Monitoring 15 
 Related Studies 16 
               List of System Related to the Study 16 
 Conceptual Framework of the Study 20 
viii 
 
CHAPTER III METHODOLOGY  
    Capstone Locale 21 
    Research Design of the Study  23 
  Requirement Planning and Analysis 25 
       System Requirements 25 
         Hardware Used 26 
         Software Used  26 
       Data Used 27 
         Datasets of the Project 27 
  User Design 30 
       Diagrams 30 
   Use Case Diagram of the System 31 
   Flowchart of the System 33 
   Entity Relationship Diagram of the System 35 
   Data Flow Diagram of the Study 36 
   Operational Framework of the System 38 
  Construction 39 
       Implementation Activities 
        Dashboard for User Admin 
39 
  
                        How the Project Worked 43 
                        Deployment Activities 43 
         Installation Activities 44 
         Maintenance Activities 48 
         Back-up and Recovery Activities 49 
     Cutover 50 
      Testing and Evaluation 50 
          Respondents 50 
          Sampling Design and Technique 51 
          Data Gathering Procedure  52 
                        Survey Instrument of the Study 52 
                          Likert Scale of Measurement for Functional 
                          Suitability, Performance Efficiency, Usability 
                          Reliability, and Compatibility 53 
                  Statistical Tool 54 
       
 
CHAPTER IV RESULT AND DISCUSSION  
        Admin module can manage user including adding, deleting,       57 
viii 
and updating information 
        Adding a user account 59 
        Deleting account information 61 
ix 
 
        Updating information 63 
        Viewing account for general services personnel profile 
information 
65 
        Generate QR Code for site name by offices and rooms 68 
        Overall users for general services personnel Report 70 
        Timestamp for location Report 72 
        Incident by location Report 74 
        Scan a QR Code by site location Module 76 
        Capture with Timestamp Camera Module 78 
        Capture with real-time incident by location Module 80 
        Generating a report on visited sites 82 
         Evaluation ratings from the respondents in terms of 
functional Suitability 
84 
        Summary of User Rating based on ISP 25010 Software Quality 
Framework  
87 
  
CHAPTER V SUMMARY, CONCLUSION AND 
RECOMMENDATION 
 
       Summary 89 
       Conclusion 91 
       Recommendation 94 
REFERENCES 96 
  
APPENDICES 10
2 
  
CURRICULUM VITAE 13
4 
x 
LIST OF FIGURES 
 
 
FIGURE                                     TITLE   PAGE 
  
1 Literature Map of the Study 11 
   
2 Conceptual Framework of the System 21 
   
3 Research Local of the Study 22 
   
4 Agile Development Model 24 
   
5 Dataset for users Table 28 
   
6 Datasets for images 29 
   
7 Use Case Diagram of the System 32 
   
8 Flowchart of the System 34 
   
9 Entity-Relationship Diagram of the System 36 
   
10 Data Flow Diagram of the System 37 
   
11 Operational framework of the Study 38 
   
12 Graphical User Interface Dashboard for Admin 41 
   
13 Graphical User Interface Dashboard for Users 42 
   
14 System Maintenance 48 
   
15 System Backup and Recovery 49 
   
16 Admin module can Manage user including adding, 
deleting, and updating information  57 
xi 
 
17 Pseudo for manage users 58 
   
18 GUI for Adding a user account 60 
   
19 Pseudo code in adding a user account 60 
   
20 GUI for Deleting account info  62 
   
21 Pseudocode in deleting account info 62 
   
22 GUI for Updating information 64 
   
23 Pseudo code in update information 65 
   
24 GUI for Viewing account info for personnel profile 66 
   
25 Pseudo code for viewing account info of personnel 
profile 67 
   
26 GUI for Generate QR Code 68 
   
27 Pseudo code in Generate QR Code 69 
   
28 GUI for Overall users for general services personnel 
Report 70 
   
29 Pseudo code for overall users Report 71 
   
30 GUI for Timestamp for location and daily image 
capture Report 72 
   
31 Pseudo code for timestamp by location Report 73 
   
32 GUI for Incident by location Report 74 
   
33 Pseudo code for incident by location report 75 
   
34 GUI for Scan a QR Code for site location 76 
35 
36 
37 
38 
39 
40 
41 
Pseudo code in scan QR  
GUI for Timestamp Camera Module 
Pseudo code in capturing images 
GUI for Capture Incident 
Pseudocode in capturing incident by location 
GUI for Generate report on visited sites 
Pseudo code in visited sites report 
77 
78 
79 
81 
82 
83 
84 
xii 
xiii 
LIST OF TABLES 
 
 
TABLE                                       TITLE PAGE 
  
1 List of Systems related to the Study 16 
   
2 Hardware Used 26 
   
3 Software Used 26 
   
4 Distribution of Respondents 51 
   
5 Likert Scale of Measurement for functionality 
suitability, performance efficiency, usability, 
reliability, and compatibility 54 
   
6 Evaluation ratings from the respondents Admin, IT 
expert, and Advisory Committee in terms of 
Functional suitability. (April 2025) 85 
   
7 Evaluation ratings from the respondents Security 
guard in terms of Functional suitability. (April2025) 
 
86 
   
8 Summary of respondents rating based on ISO 25101 
Software Quality Framework. (April 2025) 88 
 
 
 
xiv 
LIST OF APPENDICES 
 
 
APPENDIX                                  TITLE    PAGE 
  
1 Filled-Up Survey Questionnaire 103 
   
2 Raw/Tabulated Data 106 
   
3 Acceptance Form 109 
   
4 User’s Manual 112 
   
5 Relevant Source Code 115 
   
6 Nomination Form (Outline) 121 
   
7 Application for Oral Outline Defense  122 
   
8 Capstone Outline Processing Form                                     123 
   
9 Permit to Conduct 124 
   
10 Application for Oral Final Defense 125 
   
11 Capstone Final Processing Form 126 
   
12 Library Reference Certificates 128 
   
13 Plagiarism Check Certificates 128 
   
14 Communication Letters 129 
   
15 Grammarian Certificates 130 
   
16 
17 
18 
Certificate of Deployment 
Certificate of Public Presentation 
Photo Documentation 
131 
132 
133 
xv 
CHAPTER I 
THE PROBLEM AND ITS BACKGROUND 
Introduction 
Security Guard Monitoring System with the goal of increasing the 
efficiency and dependability of security operations. In a world where 
security is vital Lee (2024), this system employs technology to assure the 
proper monitoring and coordination of security personnel during patrols. 
This integration will improve security operations by requiring security staff 
to follow predetermined routes and regulations. 
Somavanshi et al., (2024) application for android that employs QR 
code technology to improve security and monitoring in places that are 
limited, like factories, warehouses, colleges, businesses, and godowns. 
Through the creation of distinct QR codes for every user, the application 
makes it possible for authorized personnel to register. Users can scan their 
QR code when they enter a restricted area, and it will be instantly validated 
against a central database to make sure that only authorized people are 
allowed in while keeping a record of entries for security reasons.
2 
However, during many shifts, security guard may work alone a 
common problem is sometimes, the guard did not monitor or no 
supervision. Security forces remained at their posts and were often 
reluctant to carry out patrols. Furthermore, this can be especially beneficial 
if the weather is bad and you need to go out in cold or rainy weather while 
on patrol but some parts of the tour may be difficult to reach or require 
climbing many flights of stairs. Security guards always tend to skip these 
parts of the tour. To address this issue of lack of supervision and incomplete 
patrols a location of Davao del Sur State College, needs to implement a 
modern monitoring system or mobile application that can integrate general 
service office guard monitoring such as QR Code place QR codes at key 
locations throughout the patrol route, including those difficult-to-reach 
areas. Additionally, Security guard has performed a role of protecting our 
lives and asset. There are still facing challenges in this system even it has 
already developed numerous modern monitoring systems in this region. 
Below will present three critical issues faced by both traditional and current 
security guard monitoring systems: tampering, missing patrols, and the 
absence of centralized control.
3 
Therefore, the researcher aims to develop an android-based general 
services office guard monitoring and site surveillance system for the Davao 
del sur State College. QR-code technology will be used to make the issuing 
process easily. General services personnel monitor all important site 
locations. Security guard use a smartphone such as scanning QR Code and 
capture using timestamp camera. This information is used to generate 
reports such as, overall users for general services personnel, timestamp for 
location and daily image capture, incident by location and report on visited 
sites. The guard monitoring and site surveillance software helps protect 
property and assets from unauthorized use. The guard monitoring and site 
surveillance software helps protect property and assets from unauthorized 
use. Study aims to design a guard monitoring and site surveillance system 
specially intended to help general services personnel efficiently monitor 
activities using a smartphone and deliver timely services to users. 
Sustainable Development Goal (SDG) 9: Industry, Innovation, and 
Infrastructure is supported by the system. This goal focuses on improving 
transportation, energy, and technology system, supporting small business, 
and encouraging research and development. Strong infrastructure and 
innovation help economy grow, provide more jobs and make life better, 
especially in developing countries.
4 
Objectives of the Study 
The primary goal of this study is to create an Android-Based Guard 
Monitoring System for Davao del sur State College. 
Specifically, it seeks to: 
1. To Develop admin account page that has the following 
functionalities; 
1.1 Manage account info for users; 
1.2 Add, delete, and update info for general services 
personnel; 
1.3 View account info for personnel profile; and 
1.4 Generate QR Code for site name by offices & rooms. 
1.5  Generate Report needed for the following; 
1.5.1 Overall users for general services personnel  
Report; 
1.5.2 Timestamp for location and daily image capture  
Report; and 
1.5.3 Incident by location Report 
2. To Develop user account page that has the following 
functionalities: 
2.1 Scan a QR Code by site location;  
2.2 Capture with timestamp camera;
5 
2.3 Capture with real-time incident; and 
2.4 Generate Report on visited sites 
3. To Evaluate the systems in terms of; 
3.1 Functional Suitability; 
3.2 Performance Efficiency; 
3.3 Usability; 
3.4 Reliability; and 
3.5 Compatibility 
Significance of the Study 
The general services office's organization is greatly aided and 
maintained by the Android-Based Guard Monitoring System. This system 
offers a more efficient and reliable way monitoring guard patrols, recording 
security activities, and ensuring all areas of the campus are regularly 
monitored. Furthermore, the system promotes a safer learning environment 
for security guards, making it an essential tool for modernizing security 
management within the institution. The study will be important and 
beneficial to the following individuals:
6 
GSO Office Head. The general services office will benefit from the 
study's findings by having less paperwork and becoming more efficient and 
adaptable in their collaboration and reporting of security personnel. 
Security Guards. That helps organizations manage, record, and 
conduct security visits to assets and ensure employees complete required 
tasks within specified timeframes. 
Future Researchers. This work can help future researchers create 
a better Android-based Guard Monitoring System as technology develops. 
Scope and Limitations 
The research is focused on implementing an Android-based Guard 
Monitoring and Site Surveillance System. By giving users roles and 
responsibilities, the system seeks to improve the effectiveness and 
dependability of security and maintenance procedures. The system will 
have two (2) user roles; the administrator will be able to configure site 
locations such as, (e.g., offices and rooms.), the administrator that will be 
handle all the functions and process in the system; security guard acting as 
one of the primary users of the system, the security guard will be tasked 
with duties including monitoring site locations, scanning QR codes
7 
placed strategically around campus locations (e.g., offices, classrooms or 
any rooms). Additionally, the security guard is responsible for using the 
camera function to capture footage or images, which are stored with 
timestamps, providing a clear and traceable record of activity. 
The data to be used will be gathered at the General Services Office 
(GSO) of Davao del sur State College. which serves as the central point for 
deploying and evaluating the system. This data will support a thorough 
analysis of the system's effectiveness in improving security monitoring and 
site surveillance, particularly within the campus context. The Android-based 
system, with its user-friendly interface and real-time data capabilities, is 
expected to simplify workflows, improve response times, and provide 
valuable insights for optimizing the college's security and general service 
operations. 
Definition of Terms 
The research creates vocabularies that are especially utilized within 
the study’s framework. This section explains the meaning of key terms to 
help readers better understand the main ideas and information discussed.
8 
Site Surveillance System. Typically done to protect a site from 
threats such as theft or fire, but can also be used to continuously monitor 
on site activity and can be used as evidence in the event of an incident at 
work. 
Android Studio. This is a reference to the user interface that will 
be used to install the Android program and take pictures of the pH value. 
DSSC. A public school for college student located in Matti, Digos 
City. 
QR Code Scanner. This refers to a device or software application 
designed to read and interpret QR codes. 
QR Code. A kind of two-dimensional (2D) barcode that makes it 
simple to retrieve information online with a smartphone or tablet's digital 
camera. 
General Services Office. The unit or office within an institution, 
organization, or local government responsible for managing and supervising 
various support services, such as maintenance, security services, property 
and supply management, and other logistical needs to ensure smooth and 
efficient operations.
9 
Rating scale. A method used to check or judge something based 
on set rules or standards. 
Timestamp Camera. A photo tool designed to allow users to 
automatically add location, signature, date and time, or even a map to any 
photo they take with their phone. 
Java Language. This refers to a straightforward, effective, general
purpose language that will be used as a programming language for 
application development and is made to have as few implementation 
dependencies as feasible. 
Real-Time Incident. The feature allows security guard to capture 
with real-time incidents in an specific location. The system will record the 
nature of incident, the affected equipment or area, and the timestamp, 
enabling immediate or reporting and efficient monitoring for follow-up 
actions. 
Android Based. A Linux-based mobile operating system mostly 
utilized by tablets and smartphones. A web browser, a graphical user 
interface (GUI), an operating system based on the Linux kernel, and 
downloadable end-user apps make up the Android platform. 
CHAPTER II 
REVIEW OF RELATED LITERATURE AND STUDIES 
Related Literature 
This portion proposes relevant and recent literature related to the 
topic. The findings from these sources will be thoroughly examined and 
compared. This will help the researcher from a strong hypothesis and 
support the study’s significance and purpose. 
Literature Map of the Study 
A map of literature is a visual summary of existing studies and 
research on a specific topic. It highlights key concepts, important findings, 
relationships, between ideas, and areas where information is lacking. The 
literature included in this section is relevant to the topic and is organized 
for analysis. The literature map is shown in figure 1. 
11 
Figure 1. Literature Map of the Study 
The system’s literature map as presents in this chapter, is shown in 
figure 1 above. The readers will find this literature map useful in rapidly 
locating the relevant literature for this research. Additionally, this study's 
primary focus is the Android-based guard monitoring system; several 
ancillary topics will be covered and clarified in the parts that follow. 
12 
Guard Monitoring  
The technologies could improve overall performance, increase guard 
awareness, and lower the expenses related to drowsiness-related incidents. 
According to Poornima1 & Ram Kumar (2023) Although there may be 
certain limitations and challenges by means of a security guard tiredness 
detection system, its general advantages make it a valuable tool for refining 
security and safety. Additionally, to maintain control and protect the 
building from harm, the guard might perform a variety of duties. As a result, 
multiple security guards are needed to cover the entire facility because the 
guard doesn't have to remain in one spot to keep an eye on things. 
Studies that utilize QR-code 
Wahsheh & Luccio (2020). It can also be used simply and efficiently 
to 
establish communication between physical objects (such as 
smartphones), Ahamed M.S. (2019) suggested a Secure QR Code (SQRC) 
solution for employing QR Codes to safely share and validate private 
information. Additionally, the kinds, encoding/decoding, and applications of 
QR codes are all covered in detail in this work. Tekale (2024)
13 
Site Surveillance System 
The extent of Site Surveillance Systems (SSS), as studied by Stone 
& Horney (2018), provides the data needed to inform decisions, track 
changes, and detect anomalies that may go unnoticed. Jung (2018), 
Systems for surveillance have always been crucial. Several closed circuit 
televisions (CCTV) are placed across the area that needs to be watched as 
part of standard surveillance systems. 
Studies that utilize Timestamp Camera 
According to Li, Z (2021). Provide information about the location of 
action segments, which can be used to further improve performance. 
Additionally, since timestamps are the most crucial method of data 
authentication in information exchange, data communication systems must 
include timestamp services. Wu, Q (2023) Additionally, Fang & Song 
(2022). Data communication systems need to have timestamp services 
since they are the most important data authentication mechanism in 
information sharing. Sensor technologies can enable real-time construction 
site monitoring to improve productivity and safety. Kempecova & Kozlovská 
(2023) These photos frequently have metadata attached to them, such as 
the time the photo was taken (timestamp) and
14 
the location of the photo’s capture (geolocation). Images' related metadata 
offers important information to help comprehend the scenes and events 
they depict. Salem (2022) 
Studies that utilize Real-Time Incident 
According to Triantafyllou et al., (2018) We propose a multi-camera, 
multi-space, real-time indoor incident detection system. With an emphasis 
on industrial settings, the system identifies events such as collisions, human 
falls, and trespassing into restricted areas. 
Zhao et al., (2020). The paper proposes an approach to predicting 
real-time incidents in online service systems using alert data. Additionally, 
Rao et al., (2022). In order to increase productivity and safety, the study 
examines sensor technology and real-time construction site monitoring 
techniques. 
Mobile Application for Guard 
A mobile application was developed to remotely manage safety 
reports and ensure compliance with safety standards in industrial 
environments. García-Cervantes, H. (2024)
15 
Android-based Guard Monitoring 
An Android-based mobile application that can monitor and control a 
building's security system. Saputra (2017). According to Sapundzhi & 
Mladenov (2022). Mobile devices are widely used in people's daily lives and 
at work these days. Online software stores offer a wide variety of software 
applications for different mobile operating systems, such as Android. 
Android is the most popular smartphone operating system. It is a widely 
used open-source system for tablets and smartphones. Sarkar (2019) is 
acknowledged as the most popular, frequently used, and easily navigable 
mobile platform. This open source Linux kernel-based operating system is 
a popular mobile operating system because of its high degree of 
customization capabilities. According to Nuakoh & Coffie (2018). By 
developing a mobile application that tracks account activity, this study offers 
a revolutionary method that provides consumers control over their account 
login and usage. The application collects information about the user's 
location, operating system, device, date, and time of login, among other 
things. Every time an account is compromised, reports are produced using 
a set of user-defined fraud rules and the user's current location.
16 
Related Studies 
To make Android-based guard monitoring easier to monitor, 
numerous internet-based guard management systems with a variety of 
underlying technologies and unique features have been developed over 
several decades. The author, system name, description, application, 
strength, and weakness listed in Table 1 are all relevant to the system that 
must be built and are seen to be crucial elements of project implementation. 
List of Systems Related to the Study 
This section focuses on systems that are directly relevant to the 
research. Each one will be described and compared to highlight their 
features. Table 1 presents various studies related to Guard Monitoring and 
Site Surveillance System. It includes the name of system, author/year, 
description, strength, weakness, and application. One notable example is 
the Systematic Camera Placement Framework for visual monitoring at the 
operation level on building sites, proposed by Kim (2019). Development of 
a systematic framework for camera placement on jobsites. The strength of 
this study development of a systematic framework for camera placement 
on jobsites.
17 
Table 1. List of Systems Related to the Study 
Name of 
System 
Systematic 
Camera 
Placement 
Framework 
for visual 
monitoring at 
the operation 
level on 
building sites. 
Aggregating 
Atomic Clocks 
for Time
Stamping. 
A context
aware system 
using mobile 
applications 
and beacons 
for on
premise 
security 
environments. 
Auth
or/ 
Year 
(Kim, 
2019) 
(Saidkhod
jaev, 
2020) 
(Skyes 
2020) 
Description 
Development of 
a systematic 
framework for 
camera 
placement on 
jobsites. 
Aggregating 
atomic clocks 
can produce 
higher integrity 
timestamps at 
the millisecond 
level for 
applications 
requiring 
accurate event 
ordering 
The author was 
tested in a 
variety of 
conditions and 
performed at an 
accuracy of 
98%, achieved 
SUS usability 
scores for 
security 
supervisors and 
security guards, 
the equivalent 
percentages are 
85% and 82%. 
Strength 
identification of 
visual 
monitoring 
determinants, 
contributing 
elements and 
the 
circumstances 
around camera 
placement. 
A timestamp is 
a critical 
component in 
many 
applications, 
such as proof of 
transaction 
ordering or 
analyzing 
algorithm 
performance. 
Easily deployed 
scalable 
solution for 
security 
monitoring in a 
range of 
environment 
configurations. 
Weakness Application 
Guard 
Monitoring 
System 
Show the 
potential 
utilizing the 
suggested 
framework to 
determine the 
ideal quantity, 
kinds, and 
positions of 
cameras for 
visual 
monitoring on a 
job site 
If any of these 
sources 
malfunction, 
experience 
delays, or are 
compromised, 
the quality and 
trustworthiness 
of the 
timestamps 
may be 
affected. 
It provides a 
low-cost 
Guard 
Monitoring 
System 
Guard 
Monitoring 
System 
18 
Continuation of Table 1... 
How to 
protect a 
SQR code 
An Android
base fall 
guard 
monitoring 
software for 
senior 
citizens 
(Goel 
2017) 
(Ni 
2019) 
QR-code are 
useful tool and 
convenient data 
sharing. 
The design and 
implementation 
of Fall Guard, 
an Android
based fall 
monitoring app 
designed for 
senior citizens. 
The System 
Quick and 
easy data 
sharing 
Fall Guard's 
terminal 
compatibility 
and 
monitoring 
accuracy are 
good. 
. 
Become 
vulnerable 
to attacks 
System 
might not 
work 
properly 
without a 
stable 
internet 
connection 
Guar
d 
Monit
oring 
Syste
m 
Guard 
Monit
oring 
The table 1 above comprises the different existing systems, 
specifically an Android-Based Guard Monitoring that are being used in the 
field of Information System. The description, strengths, weaknesses, and 
application of each system are also included. Kim (2019 Creation of  
a methodical foundation for installing cameras on construction sites. A 
camera placement framework that takes into account the features of 
intricate building sites is proposed in this research. The three primary steps 
of the suggested framework are: (1) determining the determinants, 
influencing factors, and conditions of visual monitoring; (2) defining the 
problem and performing mathematical modeling; and (3) hybrid simulation
optimization of camera placement on building sites. However, Show the 
potential of the proposed framework to find the optimal number, types,
19 
camera positions, and orientations for visual jobsite surveillance. 
Saidkhodjaev (2020) Study reports describes verified timestamping 
(VT), a way for improving the standard timestamp protocol. VT was 
developed by NIST, the National Institute of Standards and Technology, for 
use in algorithms that need exact timestamps. However, If any of these 
sources malfunction, experience delays, or are compromised, the quality 
and trustworthiness of the timestamps may be affected. 
The study of conducted by Sykes (2020). Using Android smartphones 
and Bluetooth Low Energy beacons, they concentrated on creating and 
testing a mobile application for on-premise security monitoring. The author 
obtained SUS usability values of 85% and 82% for Security Managers and 
Security Guards, respectively, after performing with an accuracy of 98% 
under various testing situations. It offers a scalable, inexpensive, and 
readily deployable solution for security monitoring across various 
environment settings. 
According to Goel (2017), the requirement for quick data access is 
growing these days due to the security field’s exponential growth. QR codes 
have proven to be a helpful tool for communicating info quickly and easily. 
However, Become vulnerable to attacks. The study of conducted by Ni 
(2019).
20 
This study develops and deploys Fall Guard, an Android-based fall 
monitoring software for senior citizens. However, the system might not 
work properly without a stable internet connection. 
Concept of the Study 
The conceptual framework of the "Android-Based Guard Monitoring 
and Site Surveillance System" is shown in Figure 2 below. The security 
guard first creates an account and enters their personal data. Later on, they 
can check other users' statuses and change or remove their own data. To 
keep an eye on patrol routes and confirm locations, administrators can 
create QR codes for particular site areas. They also supervise general 
system activity, manage guard staff, and keep an eye on who is on duty or 
on patrol. The system's features, such as timestamp-based monitoring, 
real-time incident reporting, and QR code scanning, are described in the 
diagram along with how users and administrators interact with it. Key duties 
on the admin side, which is depicted on the right side of the picture, include 
creating QR codes, managing user accounts, maintaining system control, 
and providing reports. Overall the flowchart presents a visual summary of 
the system’s workflow, demonstrating how it streamlines security 
operations through real-time monitoring.
21 
Figure 2. Conceptual Framework of the Study
CHAPTER III 
METHODOLOGY 
Capstone Locale 
The developer intended to finish the study at the General Services 
Office (GSO) of Davao del Sur State College, where data would be gathered 
and verified. The organization's exact location is shown in Figure 3. 
Figure 3. Research Locale of the System  
Located in the southern Philippine province of Davao del Sur, Davao 
del Sur State College is a government higher education institution.
23 
In 2019, under Republic Act No. 10919, it changed its name from 
the Southern Philippines Agri-Business and Marine and Aquatic School of 
Technology to become the province's only state university. With four (4) 
institutions and two (2) more campuses, the school now has more than 
5,000 students enrolled. 
This study was deployed at the General Services Office of Davao del 
sur State College. The GSO was the key office responsible for overseeing 
campus maintenance, utilities, and most importantly, security services. 
Given the office’s mandate, it served as the most strategic and appropriate 
unit for the implementation of the Android-based Guard Monitoring System. 
Research Design of the Study 
The Agile Method is a project management and software 
development approach that delivers work in small, manageable units called 
iterations or sprints. Instead of doing everything at once (like in traditional 
methods), Agile allows teams to develop, test, and improve the system 
continuously based on feedback. In general, the Agile Method provides a 
dynamic and user-centered approach to software development, which 
makes it particularly useful for intricate projects requiring quick turn around 
times, adaptability, and teamwork.
24 
Figure 4. Agile Development Model of the Application 
The agile paradigm shown in Figure 4 is ideal for developing Android 
applications since it permits flexibility and quick iterations. Since Android is 
a constantly changing platform and end-user feedback is obviously essential 
for creating improvements, agile approach places a strong emphasis on 
customer involvement and continuous improvement. Furthermore, the Agile 
model's emphasis on quick progress cycles and incremental delivery fits in 
nicely with the dynamic and quick-paced nature of developing Android 
applications. This enables rapid testing and prototyping, which makes it 
simpler to find and address problems early in the application development 
method. All things considered, the Agile methodology makes it possible for 
Android-based application projects to be developed greater effectiveness 
and efficiency.
25 
Requirements Planning and Analysis 
In order to collect, define, and analyze requirements, this segment 
is referred to as a critical phase because it requires communication with the 
end-user. It’s critical to have a thorough comprehension of what customers 
want while improving a android-based guard monitoring system to be able 
satisfy the expectations of end-users, who are the security guards and GSO 
head. Furthermore, a thorough and attentive examination of user needs, 
project scope, and resource requirements will assist system developers in 
creating a system that is both simple to use and efficient. 
System Requirements 
In this section, the essential technical aspects for creating the 
android-based guard monitoring and site surveillance system. are 
discussed. The system requirements are the necessary equipment and 
resources required for the proper operation of a system and its very 
development. These included the software, hardware, and other 
components that are necessary, manageable, and relevant to the intended 
purpose of the system and its smooth and successful operation. As a result, 
it is crucial to have a thorough understanding of the system requirements
26 
to ensure that all necessary resources are available, and that the system is 
built to achieve its intended aim. 
Hardware Used. The requirements for hardware are the 
devices and equipment needed to run smoothly a specific software or 
complete a certain task. The performance and capabilities of the system are 
largely dependent on the hardware that is used. Inadequate performance, 
security vulnerabilities, shutdowns, or other issues could result from not 
meeting the requirements. The lists of hardware requirements for system 
development are shown in Table 2. It includes the necessary devices such 
as laptop and android phone. 
Table 2. Hardware Requirements for the System Development 
Hardware 
Specification 
Laptop 
Android Phone 
● System of Operation: Windows 10 
● A processor: running at 1.8 GHz or higher is 
required. Quad-core or above is advised 
● RAM: at least 4GB. RAM of 8 GB is advised 
● Storage: Solid-State Drive (SSD) with 800 MB or 
more of free space, up to 210 GB. Ordinary systems 
need 20-50 GB of available space. 
● 2GHZ or more, 32GB of ROM or more, 3GB of RAM or 
more 
● Android OS 9 or higher 
Software Used. The software tools required to develop
27 
the system are known as the software requirements. Since these software 
tools will be essential to the project's overall success, they were carefully 
selected with attention for each feature and compatibility. The necessary 
conditions to ensure that the system will operate successfully and efficiently 
are listed in table 3. Reliable software will be utilized in the system's 
construction to guarantee dependability. To run the software needed to 
develop the system, a laptop running Windows 10 is required. Data 
pertaining to user accounts, emergency situations, and other pertinent 
information are stored and managed in the firebase. In order to develop 
the mobile app, an installing android studio is required. Moreover, for the 
creation and marketing of iOS and Android applications. 
Table 3. Software Requirements for System Development 
Software 
Specification 
Operating System 
Programming Software 
Windows 10 
Android Studio Code 
Database Management System Firebase 
Data Used 
Datasets of the project. a Dataset is a collection of data
28 
analyzed to meet the study’s objectives. It can be structured or 
unstructured, precise or impartial. The data sample presented below shows 
user information for access control and role-based functions. Figure 5 
displays users with unique IDs, role, emails, full name, birthdates, and 
gender. This data helps the system identify user and assign appropriate 
access, such as administrator and security guard. The system’s ability to 
register users and assign roles shows its efficiency in managing access. A 
large number of entries suggests active system usage. 
Figure 5. Dataset for users 
Figure 6 is an image dataset that is kept in Firebase storage and contains 
visual information that system users, particularly security guards, have 
contributed. These photos, which frequently feature the guard in front of a 
QR code site, are shot during patrol rounds. Metadata, including file name,
29 
size, type, and creation and last modification timestamps, are stored in each 
image file. Administrators can confirm that the guard was physically present 
at the appropriate time and place thanks to this functionality. Additionally, 
the usage of photographs enhances transparency and accountability in 
monitoring operations. Furthermore, proper documentation is supported by 
this well-organized and timestamped storage of visual evidence, which 
demonstrates that the guard is indeed making rounds. 
Figure 6. Datasets for images 
The figure 6 As seen above, the screen grab contains a preview of 
one chosen image in addition to file names, sizes, and dates. To make sure 
guards are making their rounds, photo evidence is grouped and 
timestamped in a guard monitoring database. The files on display are 
probably guard-collected photo evidence, with timestamps showing the 
30 
exact moment the images were shot. The chosen image, "8361cb2b-bed2
486d-d4297e480763.jpg," depicts a man who is most likely a guard, 
indicating that the system can track and validate guard behavior. 
User Design 
The following phase in the agile development model paradigm, which 
involves obtaining and taking into account user feedback, will be user 
design. This phase will offer a system skeleton that clarifies the relationship 
between the study's interfaces and its goals. In this phase, use-case 
diagrams, entity relationship diagrams, data flow diagrams, and graphical 
user interfaces will be established and designed for application. 
Diagrams 
Diagrams help visually explain different parts of a system, how it 
works, how its components connect, and how processes flow. They make 
complex ideas easier to understand, especially for team members and 
stakeholders. Diagrams are also useful tools during system analysis, design, 
and documentation, helping ensure everyone is on the same page.
31 
Use case Diagram of the System 
A use-case diagram is a graphic illustration of how a system works 
with various actors or users in a particular situation to accomplish particular 
objectives. By showing different situations or use cases including user or 
actor interaction with the system and how the system reacts to their actions, 
this diagram gives a general idea of how the system works. The relations 
between the two actors and the system are shown in figure 7 above. The 
administrator and security guard are two actors in the diagram. It 
demonstrates that the actors can use the system to carry out a variety of 
actions. As one of the actors, the administrator has access to a number of 
functions, including user management, adding a user, deleting account, 
updating information, viewing account for personnel profile information, 
generate QR code.  
The generate report action provides an overall user, timestamp by 
location and incident by location. By using these steps, administrators may 
effectively oversee the general services staff in the system and give the 
security guards immediate support.
32 
Figure 7. Use Case Diagram of the Study 
As the second actor, the security personnel can access a number of 
functions, including signing in, scanning QR code by site location, real-time 
incident and capturing images using timestamp camera. In addition to these 
important features, the security personnel can also make reports about their 
site visits using the data they collect during their rounds. The guards can 
perform their duties more quickly, easily, and correctly when they use these 
tools. Additionally, it minimizes errors and gives the administrator 
immediate access to information so they may take prompt action if 
necessary.
33 
Flowchart of the System 
A flowchart is a diagram that shows the steps, actions, or process 
flow in a sequential manner. It may be simpler to analyze and understand 
the system's operation if actions, inputs, and outputs are represented by 
symbols like ovals, diamonds, and arrows. Figure 8 The flowchart helps 
users understand the main components of the system and how they are 
connected. It makes it simpler for users and developers to understand how 
data moves through the system by explicitly illustrating the step-by-step 
procedure.  
In addition to enhancing communication and assisting even non
technical users in navigating the system, the flowchart acts as a visual guide 
for stakeholders. It facilitates future development, system design, and 
usability. It helps everyone understand the process better and work 
together more easily. Overall, the flowchart makes the system easier to 
build, use, and improve in the future.
34 
Figure 8. Flowchart of the System 
Both the administrator and the guard must enter their login 
information. They have a number of options once they've successfully 
accessed their viewpoint dashboard. The guards are needed to use a QR
35 
scanner to scan a QR code. Once the scan is complete, they are routed to 
a timestamp camera, where they can either preserve or submit the data. 
They are also required to real-time incident if they are done enter the 
incident location or incident details then capture incident and submit it. 
However, after a successful login, the administrator can take a number of 
steps. They can first control the users. Additionally, the administrator has 
the capability to edit, remove, and add users to the system. Last but not 
least, the administrator can create reports that contain a list of all users, 
timestamps by location, daily image capture, and incident information by 
location. They can also create QR codes to access the system and view 
information in their personnel profile. 
Entity Relationship Diagram of the System 
A graphical illustration or diagram of the connections between 
entities (actual items or things) in a database is called an entity relationship 
diagram, or ERD. It shows the relationships and connections between 
various entities in a database. It is possible to identify whether the 
relationships between entities are many-to-many, one-to-many, or one-to
one. This type of diagram is helpful for understanding complex data 
structures and for organizing data in a clear and systematic way.
36 
The links between different entities are explained in figure 9. It 
makes use of Martin Notation, sometimes referred to as Crow's Foot 
Notation, to show how the entities are connected. User registration, admin, 
timestamp QR code generation, site location, real-time incident, and reports 
are among the entities and their attributes that are depicted in the 
illustration. 
Figure 9. Entity-Relationship Diagram of the System 
Data Flow Diagram of the System 
The data flow diagram, or DFD, shows how information moves
37 
through a system. It illustrated how the system handles, modifies, and 
stores data. Additionally, this diagram facilitates a better analysis and 
comprehension of the system's functions or procedures, which enhances 
the system's acceptability and efficiency while enabling the detection and 
investigation of possible issues. The data flow of the system application 
procedure is depicted in figure 10. 
Figure 10. Dataflow Diagram of the System
38 
Operational Framework 
In the operational framework, the primary procedures, activities, and 
resources necessary form beginning until completion while conducting a 
plan, assignment, or strategy. The procedure explains the functions and 
duties of everyone involved. It provides a thorough strategy for completing 
a project, guaranteeing that team member are on the same page and 
pursuing the same goal. Figure 11 depicts the Android-Based Guard 
Monitoring System's operational framework. 
Figure 11. Operational framework of the Study 
The figure 11 demonstrates how the Android-Based Guard 
Monitoring and Site Surveillance System's operational structure was 
developed. This structure helps in creating the system by explaining the 
main ideas and methods used in the research. It establishes the functions 
and responsibilities of each project member; the operations framework 
39 
supports the structure and execution, which can have an important effect 
on the project's success. To facilitate understanding, the figure gives a full 
overview of the basic functionalities. 
Construction 
The process of construction is regarded as an essential phase in the 
rapid application development framework because it involves bringing the 
stated structure into existence by creating a real software system. The 
development stage is mostly concerned with creating a system that satisfies 
the client's requirements and expectations while staying in line with the 
project’s goals. 
Implementation Activities 
The deployment of the Android-Based Guard Monitoring and Site 
Surveillance System was greatly aided by the admin dashboard. The nine 
modules of the system are as follows: (1) the administrator can manage 
users; (2) add, remove, and update account information; (3) create QR 
codes for site names by office and rooms; (4) view personnel profiles; (5) 
generate reports for all users; (6) scan a QR code to locate a site; (7) use 
a timestamp camera to capture images and incidents in real time; (8)
40 
capture incidents in real time; and (9) create reports on sites visited. For 
administrative decision-making and policy implementation, the system 
guarantees accurate reporting, smooth user interaction, and effective data 
management. The primary tool for security guards or staff is the user 
dashboard, which is made to be simple to use so that they can log in, scan 
QR codes, take pictures with a timestamp camera, and document incidences 
in real time while on patrol. 
Graphical User Interface of the System. The Graphical User 
Interface (GUI) of the proposed system integrates intuitive graphical 
elements such as icons, button, dropdown menus, and interactive maps. 
These elements are designed to provide a user-friendly and educational 
means for users to interact with the system, simplifying navigation and data 
access. Figure 12 show the dashboard for admin. Figure 13 shows the 
dashboard for user. For administrators, the dashboard provides a 
comprehensive overview of system activities, including managing user 
accounts, generating QR codes, viewing timestamped captured images (T
captured), accessing various reports, managing site or area data, and 
monitoring the current status of different sites.
41 
Figure 12. Dashboard for Admin 
Figure 12, displays a dashboard interface with the name "ADMIN" 
that has a number of icons and textual details. The following icons and their 
labels are included: Manage user; when clicking, options like Add, delete, 
update, and view are displayed. View timestamp captured: This section 
includes user photos and records of the times at which the users scanned 
the QR codes. Create QR Code: This feature enables the generation of QR 
codes for locations or site names that can be displayed in rooms or offices. 
Reports: All data and generated reports pertaining to user behavior and 
system usage are stored in this part. Site/area data: All of the site names
42 
or area names generated by the create QR Code feature are stored in this 
part. A tiny seal or logo appears beneath these icons. The dashboard's 
background is a gradient of blue tones. 
Figure 13. Dashboard for Users 
Figure 13 displays a user dashboard with text descriptions and a 
number of icons. The following are the icons and what they do: a back 
arrow allows you to navigate, beside "CLEAR" and "COPY" options; a Scan 
QR code icon lets you scan or take a picture of a QR code. A camera button 
that allows users to snap photos with a timestamp is accessible through this 
symbol. The Real-Time incident indicator also has a camera button that lets 
users snap images of incidents and share the location or incident name.
43 
The surrounding text and grid lines provide the impression that the 
interface, which has a blue and white color scheme, is a part of a document 
or presentation. 
How the Project Worked 
This phrase provides the general overview of the Android-Based 
Guard Monitoring and Site Surveillance System that will be established in 
the study. The application allows administrators to manage user account 
information, add, delete, and update information for general services 
personnel, view personnel profiles, and generate QR codes for identifying 
site locations by office and room. The system allows the user to scan QR 
codes at designated site locations, take pictures with timestamps using the 
device's camera, record incidents in real time, and create reports on sites 
visited. The user’s manual features were displayed. Appendix 4. 
Deployment Activities 
This section describes a set of steps and tactics required to 
implement a system or software application in a target environment. 
Installation, testing, maintenance, and data backup are usually included to 
ensure a successful and error-free deployment. The technology may be
44 
deployed with less risk and disruption to organizational operations when a 
thorough deployment plan is in place. It also meets all the necessary 
parameters and guarantees a deployment that is affordable. 
Installation Activities. The installation plan is a thorough 
and organized document that describes the steps and procedures required 
to install a certain piece of software, hardware, or system in an efficient 
and accurate manner. 
Step 1: Open the Firebase Console 
Accessing the Firebase Console is the initial and crucial step in 
configuring your application with Firebase application this step is initiates 
the entire backend process by allowing the developer to create or access a 
Firebase project.
45 
Step 2: Register your app with Firebase 
To use Firebase in your Android app, you need to register your app 
with your Firebase project. Registering your app is often called "adding" 
your app to your project. 
Step 3: Add app to get started 
In this step, you begin connecting your mobile or web application to 
Firebase. This connection allows your app to start using Firebase tools like
46 
authentication, real-time database, storage, and analytics for a smoother 
and more dynamic user experience. 
Step 4: Create Database 
In the development of the system, Cloud Firestore a flexible, scalable 
NoSQL cloud database provided by Firebase was selected as the primary 
database solution. 
Step 5: Start a Collection (ex. Users ID) 
After successfully creating the Cloud Firestore database, the next
47 
step was to initiate data structuring by starting a collection. One of the first 
and most essential collections created was the Users collection. 
Step 6: Add field 
The system developer specified the field name and its corresponding 
data type. Firestore supports several data types, including string, number, 
boolean, timestamp, map (object), array, and reference. 
Step 7: Adding Data to Firebase Firestore Collection
48 
Once the structure of the Firestore database was established through 
collections and fields, the next step involved adding actual data into those 
collections. This process was essential for testing the system's functionality, 
displaying meaningful information to users and administrators, and storing 
records necessary for the core features such as user management, visited 
site, generate QR data, incidents, photos, scans, and scheduled table. 
Maintenance Activities. A maintenance activity is a 
collection of protocols and timetables intended to maintain systems, 
software, or hardware operating correctly while averting mistakes or 
malfunctions. In order to preserve optimal performance, the proponent 
applied essential updates and conducted routine checks on the system 
installed on the General Services Office computer. 
Figure 14. System Maintenance 
49 
Backup and Recovery Activities. Backup and recovery 
activities are a built-in processes designed to protect an organization’s data 
in case of a system failure, data corruption, or other unexpected events. 
Figure 14 illustrates the process for backing up the Guard Monitoring and 
Site Surveillance System. 
Figure 15. System Backup and Recovery 
Figure 15 shows the Cloud Firestore section's Firebase Firestore 
Database interface for the DSAP project, specifically displaying a collection 
of users and the details of a selected user document. The left panel lists 
various collections such as visited sites, incidents, and photos, while the 
right panel displays the fields and values for the user. These fields include 
address: The user address (“padada”), birthdate: The user birthdate 
(08/05/1987), full name: The user’s full name (“Melecio lora jr.”), gender:
50 
(“The user’s gender (“Male”), phone number: The user’s phone number 
(“09488233046”), user email: The user email (“melecio@gmail.com”), and 
isGuard indicating a user’s status or role (e.g., a security guard). The data 
suggests this is an application managing user data, likely within a cloud
based system. 
Cutover 
The study's goals were completely accomplished in this phase, which 
was the last in the AGILE process, and the system was prepared for 
deployment. User training, extensive testing, data collection, and system 
transition were all part of the process. To make sure the system complied 
with all criteria, it underwent several validation and verification stages 
before launch. Additionally, administrators and coders worked together to 
find any problems or flaws, and any last-minute adjustments were made to 
ensure the best possible system operation. 
Testing and Evaluation 
An essential part of the Guard Monitoring procedure that guaranteed 
accuracy and impartiality was the testing and evaluation stage. 
Respondent. The respondents were people who took part in
51 
the research study by answering questions, conducting interviews, and 
contributing data. Table 7 shows the respondents’ distribution for the 
project. It includes different types of respondents such as advisory 
committee, IT expert, security guard, Administrator. 
Table 4. Distribution of Sample Respondents 
EVALUATORS 
SAMPLE SIZE 
Advisory Committee 
IT Expert 
Security Guard 
Head of GSO 
Total 
3 
3 
7 
1 
14 
The table 4 shows the distribution of participants who will take part 
in this research. There will be for (14) respondents in all: three (3) Advisory 
Committee, three (3) IT experts, seven (7) Security guard, and one (1) 
Head of GSO. The respondents will take part in evaluating the system 
entitled ‘Android-based Guard Monitoring and Site Surveillance System’. 
Sampling and Design Technique. The researcher chose 
individuals for the assessment using purposive sampling, sometimes 
referred to as judgment sampling. Selecting people who are most 
appropriate and advantageous for the study's goals is the sampling 
approach.
52 
Data Gathering Procedure. Evaluation refers the methods 
used to assess the stud’s effectiveness, reliability, and usefulness. The 
results of the study may assist the proponent in decision-making, identifying 
areas for improvement, and validating the research. Authorization will be 
Requested by the researcher to examine the system and collect data. 
Survey Instrument of the Study. A data collecting survey 
device is a tool used to collect data or information in a structured and 
uniform way from a sample of individuals or organizations. After 
development is almost finished, a questionnaire based on the International 
Standard Organization (ISO) Software Quality Model 25101 is used to ask 
respondents to evaluate the system's performance in terms of functionality 
and dependability. The instrument was modified to meet the requirements 
of the project. The Android-Based Guard Monitoring and Site Surveillance 
System’s usability, reliability, and functionality are the three categories into 
which the questionnaire is separated. This study evaluated the system's 
Functional Suitability, Performance Efficiency, Reliability, Usability, and 
Compatibility using a paper-based survey on a 5-point Likert scale from 
Strongly Agree to Strongly Disagree. Each response was assigned a 
numerical value for statistical analysis, helping evaluate user satisfaction
53 
and system performance. Higher ratings indicated strong agreement and 
satisfaction, while lower ratings highlighted areas for improvement. 
Likert Scale of Measurement for Functional 
Suitability, Performance efficiency, Reliability, Usability and 
Compatibility. This research used Likert scale to collect respondent 
opinions, offering five answer choices per question. Each response is rated 
on a five-point scale, with 1 as the lowest and 5 as the highest score. The 
study is guided by the work Ariyani et al., (2021) & Hasanah et al., (2020) 
who applied ISO 25010 Software Product Quality Standards to evaluate 
system reliability and effectiveness. The table 8 shows the five-point scale 
used in the questionnaire, which includes: Strongly Agree, Agree, Fairly 
Agree, Disagree, Strongly Agree. The scale also includes: 4.51—5.00, 3.51- 
4.50, 2.51-3.50, 1.51-2.50, and 1.00-1.50 the mean range and 
corresponding verbal interpretations to help analyze the responses clearly. 
This method ensured consistency in evaluating the different aspects of the 
system. It allowed the researchers to determine which areas met user 
expectations and which needed improvement.  Additionally, the Likert scale 
helped simplify response analysis and allowed clear conclusion about the 
system ‘s quality and user satisfaction.
54 
Table 5. Likert Scale of Measurement for functional suitability, 
performance efficiency, reliability, usability and 
compatibility. 
Mean Range 
Descriptive 
Equivalent 
Verbal Interpretation 
4.51—5.00 
3.51- 4.50 
2.51-3.50 
1.51-2.50 
1.00-1.50 
Strongly  
Agree 
Agree 
Fairly Agree 
Disagree 
According to the measurement, participants are completely certain that the 
goals have been met and that every facet of the system's functional 
suitability, 
performance efficiency, dependability, usability, and 
compatibility has been successfully handled without any issues. 
This measure indicates that respondents acknowledge the results, even 
though the functional suitability, performance efficiency, reliability, 
usability and compatibility have not been entirely achieved and minor 
issues such as bugs, malfunctions, or unexpected outcomes may exist. 
This measure indicates that participants recognize the outcomes and 
assume that the functional suitability, performance efficiency, reliability, 
usability and compatibility objectives have been partially achieved. 
However, certain features may not be completely satisfactory for the 
respondents. 
This metric shows that the majority of participants believed the results fell 
short of their expectations. 
Strongly Disagree This metric shows that participants lacked confidence in the system's 
capacity to achieve the goals. 
Statistical Tools. In a study, a statistical instrument was 
utilized to analyze and interpret data using mathematical techniques and 
procedures. It involved looking for trends, connections, and concepts that 
were used to problem-solving or decision-making. After the proponent 
gathered the respondents' feedback on the distributed survey 
questionnaire, the data were compiled and computed. The average was 
calculated by adding together all of the evaluators' scores and dividing that 
total by the number of respondents. Weighted. The mean showed how the 
respondents were affected by the proponent's Android-based guard 
monitoring system.
55 
Formula for the equation to determine the mean value 
�
� 
Where: 
�
�
= represents the score 
= 𝑥
𝑛
Σx = represents the sum of all scores from every evaluator 
n = represents the total number of evaluators 
57 
CHAPTER IV 
RESULT AND DISCUSSION 
This chapter presents the results gathered from the evaluation of the 
Android-Based Guard Monitoring and Site Surveillance System. The 
discussion follows the system’s specific objectives, focusing on the 
functionalities designed for both the Administrator and the User. The results 
were derived from system testing, user feedback through surveys, and 
observations made during the system deployment. The system allows 
administrators to manage user accounts, Administrator evaluated the 
function that allows them to add, delete, and update information. This 
functionality enables administrator to generate QR code every specific site 
name, office, and room. Administrator tested ability to view account 
information for personnel profiles. The reporting feature, which includes 
overall users, timestamp for location, daily image capture, and incident by 
location. The functionality that allows them to scan a QR code linked to a 
particular location was assessed by the guards. The system also enables 
users to capture images with a timestamp. The capture with real-time 
incident functionality allows guard to report. The report on visited sites 
functionality gave users access to their patrol history. 
57 
Admin Module Can Manage User including Adding, Deleting, and 
Updating information 
This section describes how user account information is managed by 
the system, particularly for general services employees. The admin panel, 
seen in the picture, gives the administrator the ability to oversee the 
security guard staff. The administrator can utilize this panel to keep an eye 
on which guards are on duty or making rounds at any one time. "Robbing" 
should probably be replaced with "rounding" or "patrolling," and the 
system's "View T-Captured" capability shows the user's picture. 
Figure 16. GUI for Admin Module that Manage User 
Figure 16, shows an admin module with multiple features, such as
58 
the ability to manage user or security guard accounts. The second function 
was view collected, which was used for viewing photographs or data 
acquired by the machine. The third feature, "generate QR," produced QR 
codes. The fourth function involved managing data pertaining to sites or 
areas. The sixth function was reports, which accessed generated reports. 
Lastly, the sixth feature was site status, which showed the state of various 
sites or places. This dashboard provides administrators with quick access to 
essential tools for system oversight. It also contributes to the organization 
of security data, making it easier to monitor and make decision. 
Function: Manage users 
Requirement: Add user, delete, and update info 
Ensure: Description 
1. Upon clicking the Add button:  
2. To access the "Register" activity, CREATE a new. 
3. The "Register" activity (user registration page) should begin.  
4. Upon clicking the "Delete" button:  
5. Display the "Delete Confirmation"  
6. "Are you sure you want to delete this user?" will be shown.  
7. If "Yes" is selected by the user:  
8. Access the Firestore database's "Users" collection.  
9. - Delete the document that contains the corresponding user ID.  
10. If deletion is accomplished: 
11. Display the Toast notification, "User deleted!"  
12. Upon clicking the Update button:  
13. Construct a new intent to access the "UpdateUserActivity"  
14. Use the "USER_ID" key to append the chosen user's ID to the intent.  
15. The "UpdateUserActivity" should begin." 
Figure 17 Pseudo code for manage users including, adding 
deleting, and updating info. 
When the add button was clicked, the system creates a new intent 
to open the "Register" activity. This is where the administrator or user can 
fill out the form to create a new account. If the Delete button was clicked,
59 
a message asking, “Do you want to proceed with deleting this user?". This 
help accidental deletions. If confirmed, the system deletes the user from 
the Firestore database and shows a message saying “User deleted When 
the Update button is clicked, the system opens the Update User Activity 
page, using the selected user’s ID to load their details for editing. 
Adding user account  
The administrator is able to add a new user to the system by 
completing a that requires information such as full name, address, email, 
password, phone number, gender, birthdate, and role. This feature helps 
control access and keep staff records updated. A blue "ADD" button at the 
bottom submits the data, with a faint logo or seal in the blue and white 
background. Additionally, this feature ensures that only authorized are 
added to the system with the correct roles and information. It also makes 
the registration process. Moreover, this user registration feature improves 
the overall management of the system by allowing the administrator to 
easily track and monitor users. This also helps in generating accurate 
reports and keeping records well-organized. Ensures that all important 
fields are filled out properly. 
60 
Figure 18. GUI for Adding user account 
The figure 18 shows a registration form “Add new”. It allows users 
to enter their personal information, such as the user's full name, email 
address, password, confirm password, phone number, address, gender 
birthdate, and role as a guard (GSOSG). After filling out the form, the 
administrator can tap the add button to submit the information. 
Function: Adding user account for users 
Requirement: Add account 
Ensure: Description 
1. Open the Registration Page 
2. User enters details: 
3. Click “Submit” button 
4. If account is created: 
5. If data is successfully saved: 
Figure 19. Pseudo code in adding user account
61 
Figure 19 shows the process of creating a new account by collecting 
user details and securely saving them in the system. To begin, the user 
opens the registration form on the mobile application. Users must provide 
details including their full name, email, password, confirm password, phone 
number, address, gender, date of birth, and assigned role (e.g., Guard). To 
continue, the user must fill in all fields and then tap the “Add” button. The 
system then saves the entered data to the database, indicating that the 
user account has been successfully registered. 
Deleting account info for general services personnel 
The procedure of deleting an account is straightforward and 
methodical, and it eliminates a guard's data from the system. The 
administrator initiates this process by determining which specific account 
has to be destroyed, typically by choosing it from a list of all accounts. The 
user can proceed with the deletion after choosing the necessary account, 
guaranteeing that all associated data and access permissions are removed 
from the system forever. Additionally, this delete function keeps the system 
clean and safe. The administrator ensures that only authorized users can 
access the system by eliminating outdated or underused accounts.
62 
Figure 20. GUI for Deleting account info for users 
Figure 20 displays the option to delete an account as well as the 
confirmation window for account deletion. "Do you want to continue with 
the deletion of this user?" the screen inquires. Using the options "YES" and 
"No." This represents a technique for removing user data from a database. 
The goal of this page is to delete user account information such as name, 
email, phone number, role, and other relevant details. 
Function: Deleting a user account 
Requirement: delete account  
Ensure: Description 
1. User clicks the “Delete” button 
2. Display a confirmation dialog: 
3. Click “Submit” button 
4. Id user selects “Yes” 
5. If deletion is successful: 
Figure 21. Pseudocode in deleting user account
63 
The figure 21 display a pseudo code for deleting a user account from 
the system using the pseudocode for account deletion. The procedure starts 
when the user clicks the Delete button. A confirmation prompt will appear, 
asking for verification of the deletion. If the user confirms by clicking Submit 
and choosing Yes, the system will proceed to remove the account. If 
successful, the account will be deleted from the database. This method 
helps to prevent errors and keeps the system safe. 
Updating account info for users 
Through the account information update feature, administrators can 
edit and save changes to a user’s profile, including full name, address, 
contact number, email, date of birth, gender, and assigned role. Better 
record keeping and user management are made possible by this system's 
maintenance of correct and current information. Additionally, updating 
information helps admins keeps user details correct when there are 
changes, like a new phone number or a different role. It also avoids 
confusion by making sure each user has the right and complete information. 
This makes the system more organized and easier to manage.
64 
Figure 22. GUI for Updating information 
Figure 22 displays a form for updating account details. Users must 
enter their full name, email address (to change or confirm the user's email, 
which is often used for login or communication), password (to reset or 
update their account password for better security), phone number, address 
(to update the user's current place of residence or work), date of birth, and 
gender on the form. Additionally, checkboxes to indicate if the user is a 
guard (GSOSG) are available. Typically, the information is delivered by 
clicking the "UPDATE" button. The objective of the form is to collect user 
details for account creation.
65 
Function: Updating user account info 
Requirement: update account  
Ensure: Description 
1. User click the “Update” button 
2. Open the Update User screen: 
3. If user selects “Yes”: 
4. User modifies the necessary details  
5. User clicks the “Save” button 
6. Update the user information in the database 
7. If the update is successful: 
8. Navigate back to the previous screen  
Figure 23. Pseudo code in update information 
Figure 23 displays the pseudocode used to update user account data. 
When the administrator hits the "Update" button, the Update User screen 
is displayed, starting the procedure. if the user chooses "YES." The user 
updates the user information in the database by making the required 
changes, clicking the "Save" button, and if the update is successful, the 
system returns to the previous screen. 
Viewing Account Info for General Services Personnel Profile 
Authorized users, such as managers or administrators, can quickly 
access critical information about each employee that is kept in the system 
by using the "View Account Information" option for general services staff.  
This contains things like your entire name, contact information, role or 
position, work location, and other pertinent information. Administrators may 
rapidly review personnel assignments, verify employee records, and
66 
make sure all data is current by utilizing this tool. It aids in keeping 
personnel management organized and accurate. Additionally, managing the 
general services workforce is more efficient overall, saves time, and 
minimizes errors when all of this information is in one safe, central area. 
Figure 24. GUI for Viewing Account Info for Personnel 
Profile 
Figure 24 Administrators can examine comprehensive account 
information for staff members, including security guards, on screen 1. 
Essential information including complete name, phone number, email 
address, gender, role, job status, and other pertinent details are included 
in each personnel profile. The purpose of Screen 2 is to give each user's
67 
profile a concise and well-organized perspective. It assists the administrator 
in maintaining accurate records within the system, checking user roles, and 
verifying personnel information. This feature is crucial for effectively 
monitoring and controlling user accounts, particularly in settings where 
accurate documentation of employees, such as security guards, is 
necessary. 
Function: Viewing account info for personnel profile 
Requirement: User details 
Ensure: Description 
1. When the “View” button is clicked for user in the RecylerView  
2. IF user matches condition THEN: 
3. Extract data form document 
4. Determine role 
ELSE 
5. DISPLAY AlertDialog: 
Figure 25. Pseudo code for Viewing Account info of Personnel 
Profile 
Figure 25 pseudocode in viewing account info of personnel profile. 
The process starts when the "View" button is clicked for a user listed in the 
RecyclerView. The system proceeds to extract data from the document in 
the database. This data includes key information such as the user's name, 
email, address, contact number, gender, and other relevant profile fields 
stored in the document. Once the data is retrieved, the system determines 
the role of the user. The system displays an AlertDialog.
68 
Generate QR Code for site name by offices and rooms 
Each site has its own digital ID thanks to the creation of QR codes 
for room and office names. Quick access to information such as the 
equipment, workers allocated to the room, and its function can be obtained 
by scanning these codes with a mobile device. This makes site 
administration more effective by reducing manual tracking, improving 
security, streamlining navigation, and improving recordkeeping. 
Figure 26. GUI for Generate QR Code 
Figure 26 demonstrates the design for creating QR codes according 
to particular regions that the administrator has designated. The specified
69 
area, such as Utility (GSOPA), Ground Maintenance (GSOP), Facilities 
(GSOPA), or Main Campus (GSOSG), can be chosen from a dropdown menu 
at the top. The administrator then enters the particular office or room where 
the QR code will be allocated. After entering the information, a unique QR 
code will be generated automatically when you click the "Generate QR" 
button. After a single click, the generated QR code can be downloaded, and 
the image will be saved straight to the gallery for convenient access in the 
future. 
Function: Generate QR Code for site name by offices and rooms. offices and 
rooms 
Requirement: Site name 
Ensure: Description 
1. Get user Input 
2. DISPLAY “Enter Office name or area:” 
3. INPUT Office Name or room number:” 
4. Generate QR Code using QR Content 
5. Convert the QR Code into an image format 
6. SHOW the QR Code image on the screen. 
Figure 27. Pseudo code in Generate QR Code 
Based on user input, this pseudo code creates a QR code for a 
particular office or area. "Enter Office name or area:" will appear. Enter the 
name of the office or the room number, then use QR content to create a 
QR code. Transform the QR code into a picture. Next, show the image of 
the QR code on the screen. This improves accuracy, saves time, and 
reduces manual entry errors. It also supports a more organized and secure 
monitoring process within the system.
70 
Overall user for general services personnel report 
This feature offers a thorough summary of all users or individuals 
who have used the services that the General Services Personnel have to 
Offer Monitoring workload, efficiently allocating resources, and evaluating 
performance in providing general services like maintenance, building 
management, and other administrative assistance are all possible with the 
data collected under this function. 
Figure 28. GUI for Overall users for general services 
personnel 
Figure 28 display the "Gender Distribution" table shows the number 
and percentage of people by gender: 10 men (62.50%), 4 women
71 
(25.00%), and 1 person tagged as "Other" (6.25%), for a total of 16 people 
(100.00%). The Gender Distribution report's objective is to provide a rapid 
overview of the gender distribution of system or organization users or 
participants. This report is an essential component of data analysis in 
systems that manage user demographics or provide statistical reporting. 
Function: Overall users for general services personnel reports 
Requirement:  Gender distribution 
1. Ensure: Description 
2. ISPLAY “Gender Distribution” 
3. SET genderData 
4. SET totalUsers  
5. FOR EVERY genderData input 
6. SET percentage. 
7. Display percentage, entry.count, and entry.gender 
END FOR 
Display "Total:", “%" for all users. 
Figure 29. Pseudo code for overall users Report 
The function that creates a report for all user data is described by 
this pseudo code. Each gender category's entries ("Male", "Female", 
"Other") and the number of users in each category are initialized in a list 
called gender Data. The count values in the gender Data list are then added 
up to determine the total Users variable. This section begins with the title, 
"Gender Distribution," shown. Each entry's percentage is determined by 
dividing the count by the total number of users and multiplying the result 
by 100. The gender type, user count, and related percentage are then 
displayed.
72 
Timestamp for location Report 
This function is essential for tracking field operations, confirming 
documentation, and encouraging openness in service delivery. Additionally, 
it aids in spotting trends in photo capture, periods of high activity, and 
potentially under-monitored locations. 
Figure 30. GUI for Timestamp for location Report 
The figure 30 shows two tables: "Daily captures and location 
distribution in tabular reports from an application." The location distribution 
section lists several locations, including addresses in Digos City, Davao del 
Sur, Philippines, as well as one item indicating that the address was not 
retrievable. The daily captures section includes a table showing the number
73 
of captures every day from April 10, 2025, to April 16, 2025, and the 
associated tallies. 
Function: Timestamp location and daily image capture 
Requirement:  Timestamp location and daily image 
Ensure: Description 
1. DISPLAY “Tabular Reports  
5. Display “Location Distribution”  
6. SET LOCATIONS 
7. FOR EACH site in LOCATIONS 
8. DISPLAY site 
9. display “Daily Captures” 
10.SET CAPTURES 
11.FOR EACH capture IN CAPTURES 
DISPLAY “Date: “ + capture.date + ” | Count: ” + capture.count 
Figure 31. Pseudo code for timestamp by location Report 
Figure 31 This pseudo code explains a function that runs two parts: 
one shows the list of locations, and the other shows the number of captures 
per day. The program provides tabular reports with location data and daily 
data capture counts. The label "Location Distribution" is displayed in the 
first section, which also generates a list named locations that contains 
various addresses or site names. The locations in the list are then displayed 
one at a time using a loop. It creates a list called captures, where each item 
has a date and the number of captures on that date. The second section 
displays the label Daily Captures.
74 
Incident by location Report 
The use of the incident report function is to document, arrange, and 
present incident data according to the location of each occurrence. For 
enterprises that want to have a safe, secure, and well- managed 
environment, this function is crucial. 
Figure 32. Incident by location Report 
Figure 32. displays weekly incident statistics and incident locations 
on an application or system's "Incident Reports" interface. The "BACK" and 
"VIEW CHARTS" buttons are on the right and left of the screen, respectively, 
while the term "Incident Reports" is at the upper left. A "SELECT DATE"
75 
button highlights the "Latest Incidents" area. The screen is separated into 
two tables beneath these: "Weekly Incidents" and "Incidents by Location." 
The "Weekly Incidents" table displays information for every day of the 
week, including the quantity of occurrences and the percentages that 
correlate to them. 
Function: Incident by location Reports 
Requirement: incident location 
Ensure: Description 
DISPLAY “Weekly Incidents” 
1. SET incidentsByDay 
2. FOR EACH entry IN incidentByDay 
3. Display entry.day + “:” + entry.incidents + “entry. percentage + “%” 
4. END FOR 
5. DISPLAY “Incident by location”  
6. SET LOCATION 
7. For EACH site IN Locations 
DISPLAY site.location +”:” + site.incidents + “ site. percentage + “%” 
END FOR 
Figure 33. Pseudo code for incident by location reports 
The system shows the title "Weekly Incidents", which means it is 
displaying data about the number of incidents that happened during the 
week. The list's items include, for example: Monday: 0.00%, 0 incidences, 
Tuesday: 0.00 percent, zero incidents, Wednesday: 0.00 percent, zero 
incidents, Thursday: one instance, 10%, Friday: nine instances, 90%, and 
Saturday: 0.00 percent, zero incidents. This indicates that Friday saw the 
most events (9 out of 10), with none or just one occurring on other days. 
The incident by location shows a report of incident grouped by location 
Every item on the list has the following details: location: the name of the
76 
building or site (for example, "Dean Office" or "Building Green") incidents: 
the quantity of incidents that have been recorded their percentage: the 
proportion of all incidents that took place at that particular location. 
Scan a QR Code by site location module 
The QR Code Scanning by Site Location Module helps manage and 
monitor sites more accurately. By scanning a QR code at a location using a 
mobile device, the system instantly displays key details like the site name, 
number, date, time, year, and status. 
Figure 34. GUI for Scan a QR Code for site location 
77 
Figure 34 enables users to identify and confirm site locations by 
scanning a QR code. Users can activate the QR scanner automatically by 
clicking the "Scan QR Code" button on the home page. Users only need to 
open the scanner and scan or capture the administrator-provided QR code. 
The produced office or room name will be shown by the system for 
verification after scanning. Before continuing, the user must verify that the 
information provided corresponds to the proper site location. Users may 
readily verify locations without human input thanks to this function, which 
offers a quick and easy way to retrieve site information. 
Function: Scan QR Code by site location 
Requirement: QR code 
Ensure: Description 
1. Open QR Scanner 
2. SHOW “Scan a QR Code” 
3. IF QR Code is detected THEN: 
4. Extract QR Code Data 
5. RETRIEVE information from Firestore 
6. FOR EACH document IN “Visited Site” 
7. GET location, site name, timestamp, user, and status 
8. IF QR Code Data matches document data, THEN: 
9. DISPLAY “Area“ 
Figure 35. Pseudo code in scan QR 
Figure 35 shows the pseudocode in scan QR. The user Click, “scan a 
QR code” icon. Ready to scan a QR code, the scanner screen appears. After 
scanning, the system was redirected to the timestamp camera for real-time 
monitoring. This process ensures that each scan is recorded accurately with 
time and image, helping to verify the user's presence at a specific location.
78 
Capture with Timestamp Camera Module 
By using the app's built-in camera to take pictures and automatically 
stamping each one with the precise date, time, and location, users may 
correctly record occurrences or site visits using the Capture with Timestamp 
Camera Module. 
Figure 36. GUI for Timestamp Camera Module 
Figure 36 depicts the three panels that make up the user interface 
of a timestamp camera module: screen 1: displays the confirm save prompt 
with NO and YES options, indicating that the user has just taken an image 
and is being prompted to save it. The location and timestamp are displayed
79 
at the bottom: 0855-F07, Digos City, Davao del Sur, Philippines; the 
timestamp is 05/07/02:25 PM. Screen 2: Shows the camera tab along with 
the user's name, "melecio loro jr." and a preview of the photo that was 
taken. Additionally, the timestamp and location are displayed: 05/07/20 
02:35:45 PM and 0855-F07, Digos City, Davao del Sur, Philippines. Screen 
3: Displays the “ADMIN” section, which includes a timestamp list of security 
guards who have taken pictures, documented their presence at a particular 
location, and provided proof of presence. At the bottom, there is also the 
Davao del Sur State College logo. 
Function: Capturing with timestamp camera 
Requirement: capturing images 
Ensure: Description 
1. Display “Timestamp camera” 
2. If User Clicks Capture Button THEN: 
3. SHOW “Fetching location…” 
4. Fetch Location 
5. Display Captured Image on Screen 
6. Generate Timestamp location 
7. Save Timestamp, Location, and user name 
8. Display “Data saved successfully” 
Figure 37. Pseudo code in capturing images 
Figure 37 shows the pseudocode for capturing images using 
timestamp camera, A camera module is displayed on the system interface, 
allowing users to start the image capture process. The system starts 
gathering necessary metadata along with the picture as soon as the user 
presses the "Capture" button. Show "Fetching location" The image is
80 
displayed on the screen right away when it has been successfully captured, 
enabling the user to verify the outcome. After that, the system tags using 
it the location information that was retrieved and automatically creates a 
timestamp (the current day and time). For record-keeping or reporting 
purposes, the system saves all pertinent information, such as the image, 
timestamp, location, and user identity. A confirmation that their data was 
successfully stored is sent to the user. 
Capture with Real-time Incident by Location Module 
The purpose of the Capture with Real-Time Incident by location 
module is to make it easier to track and record incidents in real-time 
according to their precise location. The module enables users to report 
incidents in real time as they happen, recording important facts including 
the incident's kind, severity, and other pertinent data (e.g., time, 
description, and images). It captures crucial information including the kind 
of incident, how serious it was, when it happened, a synopsis, and any 
optional accompanying photos for better recordkeeping. The technology 
improves situational awareness and assists decision-makers in taking 
timely, appropriate action by recording incidents in real time. Particularly in 
emergency or time-sensitive situations, this facilitates a quicker chain of
81 
command reaction, decreases communication delays, and lowers manual 
reporting errors. 
Figure 38.GUI for Capture Incident 
Figure 38 displays a capture incident enables users to effectively 
record and report incidents. Users fill up the form by entering information 
about the occurrence, including its location and specifics. Users can submit 
it once all the information has been submitted, guaranteeing that incidents 
are appropriately documented and tracked. Additionally, this function 
enhances accountability and safety in the system. Important events can be 
documented as soon as they occur by enabling users to report occurrences 
promptly and simply. 
82 
Function: Capturing with real-time incident by location 
Requirement: incident location  
Ensure: Description 
1. Display “Enter location:” 
2. Display “Enter incident details:” 
3. FUNCTION: captureIncident: 
4. SUBMIT Incident Data 
5. Display Confirmation 
6. Display “Incident saved successfully” 
Figure 39. Pseudocode in capturing incident by location 
Figure 39 shows a capturing incident by location, users can utilize 
this feature to record and report incidents in real time. Displaying the 
location, entering incident details, capturing the incident, submitting 
incident data, displaying confirmation, and displaying the incident saved 
successfully are the first steps in the procedure. 
Generating a report on visited sites 
Users can use this feature to automatically create comprehensive 
reports of every website they have visited in a given period of time. 
Important details like the names of the locations and the dates and times 
of visits are included in every report. By having a record of visited sites, it 
becomes easier to review past visits, confirm attendance, and check if users 
followed their schedules. This is especially helpful for monitoring guard 
patrols or employee tasks. Reports are generated automatically, which 
improves accuracy by reducing manual labor and saving time.
83 
Figure 40. GUI for Generate report on visited sites 
Figure 40 displays the table "Site Visits Distribution." It includes the 
number of visits and the related percentage for various places and is divided 
into three columns: "Site," "Visits," and "Percentage." The following are the 
locations and the number of visits to each: "Area: Dev com 1" has received 
the most visits, with 24 visits, or 13.41% of all visits. With just one visit, or 
0.56% of all visits, "Area: Comp Dept" has the fewest visits. Other regions 
receive between two and seven visits, which is a rather low number. 
Moreover, this table helps the administrator see which areas are checked 
often and which are not. It shows if some places need more visits. This also 
helps improve the safety and work process in the system.
84 
Function: Generating reports on visited sites 
Requirement: Site Visits 
1. SET siteVisits 
2. SET totalVisits = SUM of all visits in siteVisits 
3. DISPLAY "Site Visits Distribution" 
4. FOR EACH site IN siteVisits 
5. SET percentage = (site.visits / totalVisits) 
6. DISPLAY site.site, site.visits, percentage 
7. DISPLAY "Total Visits:", totalVisits 
Figure 41. Pseudo code in visited sites report 
This pseudo code explains a program that creates a report of the 
websites a certain user has visited. Each site's entry and the number of 
visitors are recorded in a list called site visitors, which is initialized. The sum 
of all visit counts from the list is used to get the overall number of visits, or 
total Visits. After then, the header "Site Visits Distribution" appears to signify 
the start of the report. The percentage of visitors to each site is calculated 
by multiplying by 100 and dividing the number of visits by the total number 
of visits. Lastly, the name of the website, the number of visits, and the 
associated percentage are shown. 
Evaluation ratings from the respondents in terms of functional 
suitability 
Through the use of descriptive ratings from respondents, this study 
seeks to assess the effectiveness of the Guard Monitoring and Site 
Surveillance System. Finding strengths, weaknesses, and areas for 
84 
improvement can be aided by qualitative comments. The ratings highlight
85 
important elements and direct development to better satisfy user needs, 
enhancing the overall experience. Integrating and evaluating descriptive 
ratings offers a user-centered approach while meeting functional 
requirements. The respondents' functionality evaluations are displayed in 
table 6 below. It includes; the assessment description, mean range, and 
verbal interpretation 
Table 6. Evaluation ratings from the respondents Admin, IT expert 
and Advisory committee in terms of functional suitability 
of the system April 2025 
ASSESSMENT DESCRIPTION 
MEAN VERBAL INTERPRETATION 
The account efficiently manages the account 
info for general services personnel. 
The admin accurately deletes user account 
info. 
The admin accurately adds user information. 
The admin account efficiently updates the 
account info for general services personnel. 
The admin account accurately views 
personnel profile info. 
The admin can accurately generate QR 
code. 
The user accurately scans the QR code for 
the site location 
The user efficiently captures with a 
timestamped camera. 
The user efficiently captures images of the 
incident with location details 
The user can generate reports on visited 
sites. 
Overall users for general services personnel 
Report 
Timestamp for location and daily image 
capture 
Report 
Incident by location Report. 
4.4 
4.6 
4.5 
4.6 
4.4 
4.7 
4.6 
4.1 
4.3 
4.3 
4.1 
4 
4.1 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Agree 
Consolidated Mean 
4.3 
Agree 
86 
Table 6 shows that respondents rated the user and admin module’s 
functionality with a verbal interpretation of “Agree”. The features that 
allows administrator to generate QR code received a mean rating of 4.7, 
indicating that users found this function highly effective, efficient, and 
helpful in managing site identification and monitoring process. However, 
feature for timestamp camera and daily image capture report improving 
user interface received a mean rating of 4.00, indicating that users found 
the feature useful and working, but there are parts that still need 
improvement because some text or details are hard to read. According to 
Ariyani et al., (2021) & Hasanah et al., (2020) 
Table 7. Evaluation ratings from the respondents Security Guard 
in terms of functional suitability 
ASSESSMENT DESCRITPION  
MEAN 
VERBAL INTERPRETATION 
The user accurately scans the QR Code 
for the site location 
The user efficiently captures images 
with a camera that includes timestamp 
The user efficiently captures real-time 
incident images by location. 
The user can generate accurate reports 
on visited sites. 
4.5 
4.5 
4.8 
4.8 
Agree 
Agree 
Agree 
Agree 
Consolidated Mean 
4.65 
Agree 
Table 7 shows that respondents rated the user module’s functionality 
with a verbal interpretation of “Agree”. The features that allows users to 
87 
capture real-time incidents images by location and generate reports on 
visited sites received a mean rating of 4.8, indicating that these functions 
were found to be highly effective, reliable, and useful. However, the feature 
for scanning the QR code for site location and captures images with a 
timestamped camera received a mean rating of 4.5, indicating that users 
found these functions effective, accurate, and helpful in supporting location
based monitoring and documentation. According to, Ariyani et al., (2021) & 
Mulyawan et al., (2021) 
Summary of Respondents Rating based on ISO 25010 Software   
Quality Framework 
When developing a system, it is crucial to evaluate its functional 
suitability, performance efficiency, usability, reliability, and compatibility. 
This assessment helps the developer determine whether the system meets 
user needs and ensures user satisfaction. The table 8 shows the Summary 
of respondents Rating based on ISO 25010 Software Quality Framework.  
In order to improve and make the system more user-friendly, this 
feedback is crucial. It also helps identify areas that may need enhancements 
to ensure the system performs well in real-life use.
88 
Table 8. Summary of Respondents Rating based on ISO 25010  
Software Quality Framework April, 2025 
Quality Characteristics 
Mean 
Verbal Interpretation 
Functional suitability 
Performance efficiency 
Usability 
Reliability 
Compatibility 
4.5 
4.3 
4.2 
4.2 
4.32 
Agree 
Agree 
Agree 
Agree 
Agree 
Consolidated Mean 
4.37 
Agree 
Table 8 shows the summary of respondent ratings for the Android
Based Guard Monitoring and Site Surveillance System based on the ISO 
25010 Software Quality Framework, with a verbal interpretation of “Agree.” 
The highest rating was given to functional suitability, indicating strong user 
agreement that the system can, efficiently manages the account info for 
general services personnel, accurately add user account info accurately 
generate QR code, and can generate reports on visited sites. In contrast, 
usability and reliability received the lowest rating, reflecting that the system 
provides clear and concise details when accessing various features and the 
system operates continuously without slowdowns. The consolidated mean 
rating of 4.37 indicates that users generally agreed on the system’s quality 
and effectiveness in meeting its intended purpose.
CHAPTER V 
SUMMARY, CONCLUSION, AND RECOMMENDATION 
This chapter presents a summary of the study's key findings, 
conclusions drawn from the results, and recommendations for future 
improvements. The summary highlights the significant insights gained from 
evaluating the system based on the ISO 25010 Software Quality 
Framework. The conclusions provide an interpretation of the findings in 
relation to the study’s objectives, while the recommendations suggest 
possible enhancements and future directions to optimize the system. 
SUMMARY 
This project primary goal is to create an Android-based Guard 
Monitoring and Site Surveillance System. This application aims to improve 
security and operational efficiency by allowing real-time monitoring of 
security personnel and the sites they visit. The system was developed using 
QR code and was evaluated based on the ISO 25010 Software Quality 
Framework, focusing on functionality, performance efficiency, usability, 
reliability, and compatibility. Administrator, Advisory Committee, and IT 
expert feedback was used to assess the application’s performance achieved
90 
an overall mean score of 4.3, reflecting a good level of functionality, ease 
of use, and reliability based on their evaluation.  The security guard received 
an overall mean of 4.65, reflecting a high level of satisfaction with the 
application’s usefulness, ease of use, and support in performing daily work. 
These findings confirm that the developed system works well and 
meets the needs of its users, especially in helping them do their tasks easier 
and faster. While the results indicates that the system is effective, there 
may still be areas for improvement to make it even better and more user
friendly.
91 
Conclusion 
As the result of the research, the following conclusion: 
1. This admin module efficiently manages the crud account info for 
users. Also, it receives a consolidated mean of 4.4 this demonstrates 
that the system achieved the goal. This positive feedback reflects 
that users find the feature efficient, reliable, and easy to use in 
handling personnel records.  
2. The admin module accurately adding user account information and 
received a consolidated mean of 4.46 indicating that users found the 
feature effective, reliable, and easy to use. 
3. The admin module accurately deletes user account info and received 
a consolidated mean of 4.5 shows a high level satisfaction with this 
feature. 
4. The admin module efficiently updates the account info for general 
services personnel and received a consolidated mean of 4.6 
indicating the feature is effective and essential for keeping records 
accurate and up to date. 
92 
5. The admin module accurately views personnel profile info. Also, it 
receives a consolidated mean of 4.4 shows that they found the 
feature helpful, easy to use, and working well. 
6. The admin module accurately generate a QR code. It also received 
a consolidated mean of 4.77 indicating that users found the QR code 
feature to be practical and straightforward. This demonstrates that 
the app performs effectively in generating QR codes. 
7. The user module accurately scan the QR code for the site location. 
Also, received a consolidated mean of 4.67 indicating that users 
found the QR code scanning feature helpful, fast, and easy to use. 
8. The application efficiently captures images with a timestamped 
camera. Also, it receives a consolidated mean of 4.1 indicating that 
users found the timestamp feature useful, accurate, and easy to use. 
9. The user module has successfully implemented the following 
functionalities: efficiently captures images of real-time incident with 
location details and generate report on visited sites. It also received 
a consolidated mean of 4.3 indicating that users found the location 
tagging feature helpful, accurate, and easy to use. 
10. The application can generate reports for general services personnel
93 
11.  and received a consolidated mean of 4.1 indicating users found the 
report feature helpful and easy to use. 
12. The application can generate reports with timestamps and daily 
image captures, receiving a consolidated mean of 4 indicating these 
features useful, reliable, and effective for monitoring activities. 
13. The application can generate reports, including incident by location, 
receiving a consolidated mean of 4.1 indicates users found incident 
reporting feature helpful and simple to navigate. 
In light of the conclusion above, the Guard Monitoring and Site 
Surveillance System performs its functions efficiently and reliably, 
particularly in managing user accounts and general services personnel 
records. The features including generate QR code received a strong 
approval rating of 4.77 from respondents. Additionally, users found the 
scanning QR, received a higher consolidated mean rating of 4.67. Both 
modules were commended for making tasks easier and helping with 
data-based decisions. Overall, the system successfully met its objectives 
by providing a reliable, easy-to-use, and efficient platform for managing 
personnel and operational data.
94 
Recommendation 
Based on the conducted assessment, there are four identified major 
recommendation to enhance the developed Guard Monitoring and Site 
Surveillance System. These recommendations are: 
1. Implementing an add emailed One-Time Password (OTP) as an 
authentication method to ensure data security.  
2. Provide offline functionality to ensure for users in areas with 
limited internet connectivity can access.  
3. Provide real-time incident verification by allowing the admin to 
immediately verify or validate reported incidents as they occur, 
and generating visual reports with accurate timestamps 
indicating when each incident happened and when it was 
reviewed.   
4. Ensure cross-platform compatibility, so the application works 
seamlessly on both Android and iOS devices, giving users flexible 
and convenient access regardless of their mobile platform.  
Overall, the recommended enhancements such as adding an emailed 
One-Time Password (OTP), offline application, real-time incident
95 
Verification, generating visual reports with accurate timestamps, and cross
platform compatibility so the application works seamlessly on both android 
and IOS devices. The recommendations are meant to improve how the 
system's works. In the future, the study suggests integrating SMS 
notification features for incident data, allowing users to receive real-time 
alerts and updates via text message. This would further enhance 
communication and responsiveness, especially in critical situations. 
REFERENCES 
Alhudhud, G., Alsaeed, D. H., Al-Baity, H., Al-Humaimeedy, A. S., & Al
Turaiki, I. (2019). iGuard: Mobile security guard system with infrared 
biosensor and google glass. Bioscience Biotechnology Research 
Communications 
12(2), 
https://doi.org/10.21786/BBRC/12.2/16 
333-547. 
Ahamed, M. S., & Mustafa, H. A. (2019). A secure QR code system for 
sharing personal confidential information. In 2019 International 
Conference on Computer, Communication, Chemical, Materials and 
Electronic 
Engineering 
(IC4ME2) 
(pp. 
1-4). 
https://doi.org/10.1109/IC4ME247184.2019.9036521 
IEEE. 
Ariyani, S., Sudarma, M., & Wicaksana, P. A. (2021). Analysis of functional 
suitability and usability in sales order procedure to determine 
management information system quality. INTENSIF Jurnal Ilmiah 
Penelitian Dan Penerapan Teknologi Sistem Informasi, 5(2), 234
248. https://doi.org/10.29407/intensif.v5i2.15537 
Bao, S., Lin, J. H., Howard, N., & Lee, W. (2023). Development of Janitors’ 
workload calculator. In Proceedings of the human factors and 
ergonomics society annual meeting (Vol. 67, No. 1, pp. 1043-1048). 
SAGE Publications. https://doi.org/10.1177/21695067231192623 
Darie, T., R Aprodu, C. (2024). Aspecte particulare ale politicii de personal 
în servicii [Particular aspects of staff policy in the services]. Lucrări 
ştiinţifice ale Simpozionului Ştiinţific al Tinerilor Cercetători 1, 174
177. https://doi.org/10.53486/sstc.v1 
Fang, C., Song, S., & Mei, Y. (2022). On repairing timestamps for regular 
interval time series. Proceedings of the VLDB Endowment 15(9), 
1848-1860. https://doi.org/10.14778/3538598.3538607 
97 
Gannapathy, V. R., Narayanamurthy, V., Subramaniam, S. K., Ibrahim, A. 
F. B. T., Isa, I. S. M., & Rajkumar, S. (2023). A mobile and web
based security guard patrolling, monitoring and reporting system to 
maintain safe and secure environment at premises. International 
Journal 
of 
Interactive 
Mobile 
https://doi.org/10.3991/ijim.v17i11.35483 
Technologies, 
17(11). 
Goel, N., Sharma, A., & Goswami, S. (2017). A way to secure a QR code: 
SQR. In 2017 International Conference on Computing, 
Communication and Automation (ICCCA) (pp. 494-497). IEEE. 
https://doi.org/10.1109/CCAA.2017.8229850 
Gokasar, I., & Karaman, O. (2023). Integration of personnel services with 
public transportation modes: A case study of Bogazici University. 
Journal of Soft Computing and Decision Analytics, 1(1), 1-17. 
https://doi.org/10.31181/jscda1120231 
Hasanah, N.A., Atikah, L., & Rochimah, S. (2020). Functional Suitability 
Measurement Based on ISO/IEC 25010 for e-Commerce Website. In 
2020 7th International Conference on Information Technology, 
Computer, and Electrical Engineering (ICITACEE) (pp 70-75). IEEE. 
https://doi.org/10.1109/icitacee50144.2020.9239194 
Imanullah, M., & Reswan, Y. (2022). Randomized QR-code scanning for a 
low-cost secured attendance system. International Journal of 
Electrical 
and 
Computer Engineering, 12(4), 3762-3769. 
https://doi.org/10.26623/transformatika.v17i1.1471 
Jung, J. Yoo, S. La, W. G. Lee, D. R., Bae, M. & Kim, H. (2018). Airborne 
video 
surveillance 
system. 
https://doi.org/10.3390/s18061939 
Sensors, 
18(6), 
1939. 
Kempecova, D., & Kozlovska, M. (2023). Sensing technologies for 
construction productivity monitoring. MATEC Web of Conferences 
385, 
Article 
https://doi.org/10.1051/matecconf/202338501032
01032. 
98 
Kim, J., Ham, Y., Chung, Y., & Chi, S. (2019). Systematic camera placement 
framework for operation-level visual monitoring on construction 
jobsites. Journal of Construction Engineering and Management, 
145(4), 
04019019. 
7862.000163 
https://doi.org/10.1061/(ASCE)CO.1943
Lee, J. L. (2024). Security guard monitoring system [Doctoral dissertation, 
university tuknu abdul rahman]. UTAR Institutional Respiratory. 
http://eprints.utar.edu.my/id/eprint/6650 
Llaguno-Munitxa, M. (2023). Site-surveying: Architecture and it's local 
ecology. 
Lieuxdits, 
https://doi.org/10.14428/ld.vi23.76823 
(23), 
14-21. 
Mulyawan, M. D., Swamardika, I. B. A., & Saputra, K. O. (2021). Analisis 
Kesesuaian Fungsional Dan Usability Pada Sistem Informasi Karma 
Simanis Berdasarkan Iso/Iec 25010 [Analysis of functional suitability 
and usability in the karma simanis information system based on]. 
JURTEKSI (Jurnal Teknologi dan Sistem Informasi), 7(3), 293-302. 
https://doi.org/10.33330/JURTEKSI.V%VI%I.1139 
Ni, J., Zhu, W., Huang, J., Niu, L., & Wang, L. (2019). Fall guard: Fall 
monitoring application for the elderly based on android platform. In 
ACM international conference proceeding series (pp. 128–135). 
Association 
for 
Computing 
https://doi.org/10.1145/3354031.3354055 
Machinery. 
Nuakoh, E. B., & Coffie, I. (2018). MonitR: A mobile application for 
monitoring online accounts' security. In SoutheastCon 2018 (pp. 1
9). IEEE https://doi.org/10.1109/SECON.2018.8478857 
Paudel, N., & Neupane, R. C. (2019). A general architecture for a real-time 
monitoring system based on the internet of things. In Proceedings 
of the 2019 3rd international symposium on computer science and 
intelligent 
control 
https://doi.org/10.1145/3386164.3387295
(pp. 
1-12). 
99 
Poornima, E. Kumar, R. P. R. Katukam, S. Pericherla, V. V. & Birelli, S. K. 
(2023). A real-time IoT-based model to detect and alert security 
guards’ drowsiness. E3S Web of Conferences, 391, Article 01151. 
https://doi.org/10.1051/e3sconf/202339101151 
Putra, I. G. E. P., Jati, A. N., & Saputra, R. E. (2017). Monitor and control 
panel of building security system integrated to Android smart phone. 
In 2017 International Conference on Robotics, Biomimetics, and 
Intelligent Computational Systems (Robionetics) (pp. 29-33). IEEE 
https://doi.org/10.1109/ROBIONETICS.2017.8203432 
Rao, A. S., Radanovic, M., Liu, Y., Hu, S., Fang, Y., Khoshelham, K., 
Palaniswami, M., & Ngo, T. (2022). Real-time monitoring of 
construction sites: Sensors, methods, and applications. Automation 
in 
Construction, 
136, 
https://doi.org/10.1016/j.autcon.2021.104099 
104099. 
Salem, T., Hwang, J., & Padilha, R. (2022). Timestamp estimation from 
outdoor scenes. Embry-Riddle Aeronautical University. 
https://commons.erau.edu/adfsl 
Saidkhodjaev, T., Voas, J.M., Kuhn, R., Defranco, J., & Laplante, P.A. 
(2020). Aggregating Atomic Clocks for Time-Stamping. In 2020 IEEE 
International Conference on Service Oriented Systems Engineering 
(SOSE), 1-6. https://doi.org/10.1109/SOSE49046.2020.00008 
Somavanshi, S. R., Bhand, S. J., Lende, S. D., & Pansare, P. Android 
Application for: Secure employee track vision. International Journal 
of Advanced Research in Science, Communication and Technology, 
4(2). https://doi.org/10.48175/ijarsct-22181 
Sapundzhi, F., & Mladenov, M. (2022). An android-based mobile application 
giving information for weather in real-time [Special issue]. Bulgarian 
Chemical Communications, 54, (B1), 89-91.  
https://doi.org/10.34049%2Fbcc.54.B1.0455
100 
Setiawan, A. (2019). Evaluasi kinerja karyawan level pelaksana satuan 
pengamanan pada perguruan tinggi menggunakan metode simple 
addictive weighting [The method used for performance evaluation 
the security unit is simple additive weighting]. Jurnal Transformatika, 
17(1), 
26-33. 
https://doi.org/10.26623/TRANSFORMATIKA.V17I1.1471 
Sykes, E. R. (2020). A context-aware system using mobile applications and 
beacons for on-premise security environments. Journal of Ambient 
Intelligence and Humanized Computing, 11(11), 5487–5511. 
https://doi.org/10.1007/s12652-020-01906-2 
Stone, K., & Horney, J. A. (2018). Methods: Surveillance. In Disaster 
epidemiology (pp. 11-23). Academic Press. 
https://doi.org/10.1016/B978-0-12-809318-4.00002-2 
Triantafyllou, D., & Krinidis, S. (2018). A real-time, multi-space incident 
detection. 
Safety 
and 
Security 
Studies, 
https://doi.org/10.2495/SAFE-V8-N2-266-275 
8(2), 
266-275. 
Villaseñor-Ramírez, M.A., Carrillo-Hernández, D., Blanco-Miranda, A.D., & 
García-Cervantes, H. (2024). Implementation of mobile monitoring 
technology for industrial safety. Journal-Economic Development 
Technological 
Chance 
and 
Growth. 
https://doi.org/10.35429/jedt.2024.8.14.4.8 
8(14), 
1-18. 
Wu, Q., Han, Z., Mohiuddin, G., & Ren, Y. (2023). Distributed timestamp 
mechanism based on verifiable delay functions. Computer Systems 
Science 
& 
Engineering, 
https://doi.org/10.32604/csse.2023.030646 
44(2). 
Yusuf, I., & Leidiyana, H. (2021). Android based employee attendance app 
using QR code Scanning and location-based service. Journal of 
Informatic 
and 
Information 
Security, 
https://doi.org/10.31599/jiforty.v2i1.569
2(1), 
35-44. 
101 
Zhao, N., Chen, J., Wang, Z., Peng, X., Wang, G., Wu, Y., Zhou, F., Fang, 
Z., Nie, X, Zhang, W., Sui, K., & Pei, D. (2020). Real-time incident 
prediction for online service systems. In Proceedings of the 28th ACM 
joint meeting on European software engineering conference and 
symposium on the foundations of software engineering (pp. 315
326). 
Association 
for 
Computing 
https://doi.org/10.1145/3368089.3409672 
Machinery. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
103 
 
Appendix 1. Filled-up Survey Questionnaire 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
104 
 
Continuation… 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
105 
 
Continuation… 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
106 
 
Appendix 2. Raw/Tabulated Data 
 
Evaluation rating from the respondents Admin, IT expert, and Advisory 
Committee in terms of the Functional Suitability. 
 
 
 
 
 
 
  
 
  
 
 
 
 
 
 
 
 
   
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
107 
 
Continuation… 
 
Evaluation rating from the respondents Security guard in terms of 
functional suitability 
 
 
 
 
 
 
  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
  
 
 
 
108 
Continuation… 
Summary of respondents rating based on ISO 25010 Software Quality 
Framework 
109 
 
Appendix 3. Acceptance Form 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
110 
 
Continuation… 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
111 
 
Continuation… 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
113 
 
 
Appendix 4. User’s Manual 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
 
 
 
 
 
 
 
 
 
 
 
 
ADMIN MODULE 
 
Step 1. Overview of Admin 
Dashboard. After logging in, the 
dashboard will show a concise 
overview of its primary elements., 
including manage user, generate 
QR, view T-captured, reports, sites 
status, and sites or area data. 
 
Step 2. List of Security 
Personnel. 
When the administrator clicks the 
"Add New" button, a form with the 
new security staff's details appears. 
This allows the administrator to add 
users, delete account information, 
amend information, and see 
account personnel profiles. Click 
the "Delete" button in order to 
remove a security personnel 
account. Find the individual's 
profile that you wish to delete. 
Verify the deletion (if prompted). 
The system might request 
confirmation before moving 
further. After being deleted, the 
account will be gone from the 
system forever. You must be 
careful to remove the correct 
account because the deleted profile 
cannot be retrieved. To update the 
details of a security guard, click the 
"Update" button. Find the profile 
that needs editing. Current 
information (e.g., name, email, 
contact number, role) will be 
displayed in a form. At this point, 
you can make the required 
adjustments or modifications. To 
update the record after editing, 
select Save or Submit. The profile 
will now show the updated 
information. Click "View" button to 
see all of the account details for a 
security guard. You wish to look at 
the personnel's profile card. Your 
personal details such as full name, 
address, email, and contact 
number, password, birthdate, 
gender, and role will all be 
displayed on a new screen or pop
up window. For review or 
verification, use. 
113 
Continuation… 
Step 3. Generate QR 
Code. To create a QR 
code-assigned location, 
just select the location 
using 
the dropdown 
menus when completing 
the form: Click the 
dropdown and choose 
the area name, such as 
Main Campus, Admin 
Building, or ICET Area.  
Click the "Generate QR" 
button after entering all 
the 
information 
and 
choosing the location. A 
special QR code that 
connects to the location 
will be generated by the 
system. 
Click 
the 
"Download QR" button to 
save the QR code for 
printing or sharing after 
it has appeared. 
Step 
4. View T
Captured. To see the 
timestamps that were 
recorded, click on the 
icon. 
Timestamped 
photos of users who 
were either working or 
under surveillance will be 
displayed in a list. As 
evidence, these show 
that the administrator 
can confirm who is there 
and working on a certain 
day. 
Step 5. View Reports. 
Just click the. "Reports" 
tab or button on the 
dashboard to access 
reports. Comprehensive 
logs, 
summaries, 
or 
graphic information such 
incident reports, daily 
captures, 
location 
dispersion, 
and 
user 
activity are shown in this 
part. 
113 
114 
USERS ADMIN 
MODULE 
Step 6. Scan QR code. Use 
a mobile device or a scanning 
tool included in the system to 
launch the QR scanner in 
order to scan a code. When 
the camera is pointed at the 
QR code, it will automatically 
display the associated data, 
such as the timestamp, 
allocated location, or profile of 
the security guard. 
Step 
7. 
Timestamp 
camera. Real-time photos of 
staff members are captured 
by the timestamp camera, 
which also records the precise 
time and date. With each 
photo acting as evidence of 
presence at a certain time, 
this function is utilized to track 
and document attendance or 
activity. 
Step 
8. 
Real-Time 
incident. Users are able 
to 
report 
and track 
incidents as they occur 
because to the real-time 
incident 
feature. 
An 
incident can be instantly 
recorded in the system 
with pertinent information 
like 
the location and 
description. 
114 
 
 
 
 
 
115 
Appendix 5. Relevant Source Code 
Source code in Managing users including adding, deleting, and updating 
information 
Source code in Adding user 
116 
 
Source code in deleting account  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
Source code in updating information 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
117 
Source code in viewing account of personnel profile info 
Source code in generating QR code 
118 
 
Source code in overall users report 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
Source code in Timestamp by location and Daily image capture report 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
119 
 
Source code in incident by location report 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
Source code in scanning QR code 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
120 
 
Source code in timestamp camera 
 
 
 
 
 
 
 
 
 
 
 
 
Source code in real-time incident  
 
 
 
 
 
 
 
 
 
 
 
 
Source code in visited sites report 
 
 
 
 
 
 
 
121 
 
Appendix 6. Nomination Form (Outline) 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
122 
 
Appendix 7. Application for Oral Outline Defense 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
123 
 
Appendix 8. Capstone Outline Processing Form 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
124 
 
Appendix 9. Permit to Conduct 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
125 
 
Appendix 10. Application for Oral Final Defense 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
 
 
 
 
126 
 
Appendix 11. Capstone Final Processing Form 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
127 
 
Appendix 12. Library Reference Certificates 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
128 
 
Appendix 13. Plagiarism Check Certificates 
 
 
 
 
 
 
 
  
 
 
  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
129 
 
Appendix 14. Communication Letters 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
130 
 
Appendix 15. Grammarian Certificates 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
131 
 
Appendix 16. Certificate of Deployment 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
132 
Appendix 17. Certificate of Public Presentation 
133 
Appendix 18. Photo Documentation (Testing, Evaluation, Deployment, 
and Defense) 
During Title Defense 
During Outline Defense 
During the Conduct of System Evaluation with the Respondents 
During Final Defense 
134 
 
 
CURRICULUM VITAE 
   
 
 
MARIEL U. ONDOS 
Marber, Bansalan, Davao del Sur 
marielondos14@gmail.com 
09677039269 
   
PERSONAL INFORMATION 
  
Birthdate: March 29, 2002 
Birthplace: Marber, Bansalan, Davao del Sur 
Age: 23 
Sex: Female 
Civil Status: Single 
Citizenship Filipino 
Father’s Name: Romanelio A. Ondos 
Mother’s Name: Myrna U. Ondos 
    
EDUCATIONAL BACKGROUND 
    
Tertiary Bachelor of Science in Information Technology 
 Davao del Sur State College (DSSC) 
 Matti, Digos City, Davao del Sur 
 On-going 
  
Secondary  
 Senior High School 
 Global System Institute of Technology 
 Lily St., Bansalan, Davao del Sur 
 2019 – 2020  
  
 Junior High School 
 Marber National High School 
 Marber, Bansalan, Davao del Sur 
 2014 – 2018  
  
Primary Isaac Abalayan Elementary School 
 San Jose, Digos City, Davao del Sur 
 2008 – 2014  
 