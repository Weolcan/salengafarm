ABSTRACT


	SAYADI, ARBEAH A. and RILLO, EUNALIZA E. Davao del Sur State College Institute of Computing Engineering, and Technology Matti, Digos City. October 2025 “REGISTRACK: A WEB-BASED DOCUMENT SUBMISSION AND VERIFICATION SYSTEM FOR FRESHMEN STUDENT WITH DATA ANALYTICS”. Undergraduate Capstone Project. 


Adviser: NEL R. PANALIGAN, MSIT


The study was conducted to develop RegisTrack, a web-based document submission and verification system designed to simplify and monitor freshmen student requirements at Davao del Sur State College (DSSC). The system addresses the challenges faced by the Registrar’s Office in managing manual document submissions, verification processes, and online requests. RegisTrack provides a Super Administrator Account capable of creating and managing admin accounts, monitoring freshmen submissions and online requests, generating descriptive analytics, and exporting approved submissions in PDF format. The Admin Submissions Page enables staff to verify and update document statuses and add remarks, while the Admin Requests Page supports updating request statuses, assigning release dates, sending email and SMS notifications, and generating analytics on request distribution and pending transactions. A total of 10 respondents participated in the system evaluation, composed of 4 Advisory Committee members, 1 Super Administrator, 3 Registrar’s Office staff, and 2 Admission Office personnel. The system was assessed based on the ISO 25010 Software Quality Framework, which includes Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility. The results demonstrated strong user satisfaction, with an overall mean rating of 4.22 (“Agree”), indicating that the system effectively meets software quality standards and performs reliably across all evaluated areas. Among the evaluation dimensions, Usability received the highest mean score of 4.42, suggesting that users found the system easy to navigate and efficient to use. These findings show that RegisTrack significantly improves efficiency, transparency, and accessibility in document processing while providing data-driven insights to support administrative decision-making. Despite its limitations—such as reliance on internet connectivity and the continued need for manual document verification—the system shows strong potential to modernize document management, reduce administrative workload, and enhance service delivery for both students and staff at DSSC.
Keywords: document submission, student compliance, registrar system,
    web-based platform, online requests
SDG’s: 4 Quality Education, 16 Peace, Justice, and Strong Institutions 

REGISTRACK: A WEB-BASED DOCUMENT SUBMISSION AND
VERIFICATION SYSTEM FOR FRESHMEN STUDENTS
WITH DATA ANALYTICS








ARBEAH A. SAYADI
EUNALIZA E. RILLO








CAPSTONE PROJECT SUBMITTED TO THE FACULTY OF THE
COLLEGE OF COMPUTING, ENGINEERING AND
TECHNOLOGY, DAVAO DEL SUR STATE 
COLLEGE, MATTI, DIGOS CITY. IN 
PARTIAL FULFILLMENT OF 
THE REQUIREMENTS FOR
THE DEGREE OF 



BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY





NOVEMBER 2025 
APPROVAL SHEET


This capstone project entitled “REGISTRACK: A WEB-BASED DOCUMENT SUBMISSION AND VERIFICATION SYSTEM FOR FRESHMEN STUDENTS WITH DATA ANALYTICS” prepared and submitted by ARBEAH A. SAYADI and EUNALIZA E. RILLO in partial fulfillment of the requirements for the degree of Bachelor of Science in Information Technology, is hereby accepted.

		   
  CARLITO JR. M. REHANG	     DULCE MARIE MARTINEZ, MAED	     
                Member 						Member
________________				   _________________
      Date signed					Date signed

		   
  NEL R. PANALIGAN, MSIT		   RHEA MAE L. PERITO, MSIS
  	      Adviser			     		          Chairperson
________________				    _________________
      Date signed				          Date signed


Accepted and approved as partial fulfillment of the requirements for the degree of Bachelor of Science in Information Technology (BSIT).


DOMINGO V. ORIGINES JR., IT.D.
Chairperson, Computing Department

___________
Date signed


EDUARDO F. AQUINO, RPAE, MSME
Dean, Institute of Computing, Engineering and Technology

___________
Date signed 
ACKNOWLEDGMENT


The researchers express their deepest gratitude to the One Divine Source of all creation — known to many as Allah (SWT), God, or by other sacred names — for granting them wisdom, strength, and perseverance throughout the completion of this capstone project. Through divine guidance, every challenge was met with faith, patience, and hope.
Heartfelt appreciation is extended to their adviser, Mr. Nel R. Panaligan, MSIT, for his invaluable guidance, encouragement, and unwavering support. The researchers also sincerely thank the panel members, technical critic, and grammarian for their insights and contributions that greatly enhanced this study.
Lastly, the researchers express profound gratitude to their families and loved ones for their endless support, love, and understanding throughout this journey.





TABLE OF CONTENTS


PRELIMINARY PAGES	PAGE
	
	
ABSTRACT 
TITLE PAGE 
APPROVAL SHEET
ACKNOWLEDGMENT 
TABLE OF CONTENTS
LIST OF FIGURES
LIST OF TABLES
MEAN VALUE 
LIST OF APPENDICES	i
	iii
	iv
	v
	vi
	x
	xi
	xiii
	xiv

CHAPTER I THE PROBLEM AND ITS BACKGROUND
	Introduction	1
	Objectives of the Study	3
	Scope and Limitation	5
	Significance of the Study	7
	Definition of Terms	8
		
CHAPTER II REVIEW OF RELATED LITERATURE AND STUDIES
	Related Literature	13
	Literature Map of the Study	13
	Data Analytics	14
	Prescriptive Analytics	15
	Predictive Analytics	15
	Descriptive Analytics	16
	Data Mining	16
	KPI Tracking	17 
	Data Visualization	17
	Distribution Visualization	18
	Geographical Visualization 	19
	Interactive Dashboard	19
	Related Studies	20
	List of Studies Related to the System	20
	Concept of the Study	27
		
CHAPTER III METHODOLOGY	
	Capstone Locale	31
	Research Design of the Study	32
	Requirements Planning 	34
	System Requirements	34
	Hardware Used	35
	Software Used 	36
	Data Gathering	37
	Data Collection	37
	Data Table	38
	User Design	42
	Diagrams 	42
	Use Case Diagram 	43
	Entity Relationship Diagram of the System	45
	Data Flow Diagram of the System	48
	Flowchart of the System 	52
	Operational Framework of the System	55
	Construction	57
	Implementation Activities	57
	How the System Worked	64
	Deployment Activities 	66
	Installation Activities 	66
	Maintenance Activities	67
	Backup and Recovery Activities	68
	Cutover	69
	Testing and Evaluation	69
	Respondents	69
	Sampling and Design Technique	70
	Data Gathering Procedure	70
	Survey Instruments	71
	Likert Scale of Measurement for Functionality  
     Suitability, Performance Efficiency,   
     Usability, Reliability, and Compatibility	

72
	Statistical Tools	74
		
CHAPTER IV RESULTS AND DISCUSSION 	
	Super Admin Module That Creates and Manage Administrator
    Accounts and Their Privileges	
75
	Super Admin Module for Tracking Freshmen Submissions and 
    Exporting Reports of Approved Documents	
77
	Super Admin Module That Tracks Online Request Transactions	80
	Super Admin Module that Generates Descriptive Data Analytics 
    on Document Type Distributions	
82
	Super Admin Module That Generates Descriptive Data 
    Analytics on Request Distribution	
84
	Super Admin Module that Displays Student Submission Status 
    with Checklist per Requirement	
86
	Super Admin Module that Generates List of Students with 
    Pending Requests	
88
	Admin Module That Manages Freshmen Document Submission 
    Can Verify, Update and Add Optional Remarks or
    Instructions	

90
	Admin Module That Generates Descriptive Data Analytics on 
    Document Type Distributions	
92
	Admin Module That Generates List of Students with 
    Incomplete Submissions by Program and Institution	
94
	Admin Module That Manages Document Requests Can Update 
    Requests Status	
96
	Admin Module That Assigns Release Date for Approved 
    Documents and Notify Student via Email and SMS	
98
	Admin Module That Can View Request History	100
	Admin Module That Generates Descriptive Data Analytics on     
    Request Distribution	
102
	Admin Module That Generates List of Students with Pending
    Requests	
104
	Evaluation Ratings of Respondents in Terms of Functional 
    Suitability Based on the ISO 25010 Software Quality 
    Framework	

106
	Summary of Respondents’ Rating Based on ISO 25010 
    Software Quality Framework	
112
		
CHAPTER V SUMMARY, CONCLUSION AND RECOMMENDATIONS
	Summary	115
	Conclusion	117
	Recommendation	121
		
REFERENCES	123
		
APPENDICES	129
		
CURRICULUM VITAE 	147
 
LIST OF FIGURES


FIGURES	TITLE	PAGE
		
1	Literature Map of the Study	14
		
2.1	Conceptual of the Study (Super Admin)	27
		
2.2	Conceptual of the Study (Admin)	28
		
3	Research Locale of the Study	32
		
4	Rapid Application Development of the Study	33
		
5	Admin Submission Assets Data Table	38
		
6	Admin Submission Assets Data Table	40
		
7	Admin Request Assets Data Table	41
		
8	Use Case of the Diagram of the Study	45
		
9	Entity-Relationship Diagram of the Study	46
		
10.1	Data Flow Diagram for Super Admin Activity	48
		
10.2	Data Flow Diagram for Document Submissions Admin Activity	
50
		
10.3	Data Flow Diagram for Document Requests Admin Activity	
51
		
11.1	Flowchart of the System	53
		
11.2	Flowchart Connector A for the Admin Activity	54
		
11.3	Flowchart Connector B Continuation for the Admin Activity	
54
		
12	Operational Framework of the Study	56
		
13	Flowchart for Super Admin Accounts	59
		
14	Flowchart for Submission Admin Accounts	61
		
15	Flowchart for Request Admin Accounts	62
		
16	GUI of Admin Management	76
		
17	Pseudocode for Super Admin Module That Manage Admin	77
		
18	GUI of Track Freshmen Student Submissions and Exports Approved Reports  	78
		
19	Pseudocode for Super Admin That Track Freshmen Document Submissions	
80
		
20	GUI of Track Online Requests Transactions	81
		
21	Pseudocode for Super Admin That Track Online Requests	
82
		
22	GUI for Generate Descriptive Data Analytics on Document Type Distributions	
83
		
23	Pseudocode for Super Admin That Generate Descriptive Data Analytics on Document Type Distributions	
84
		
24	GUI for Generate Descriptive Data Analytics on Requests Distributions	85
		
25	Pseudocode for Generate Descriptive Data Analytics on Requests Distributions	86
		
26	GUI for Displays Student Submission Status with Checklist per Requirement	
87
		
27	Pseudocode for Super Admin Module That Displays Student Submission Status with Checklist per Requirement	

88
		
28	GUI for Generate List of Students with Pending Requests	
89
		
29	Pseudocode for Generate List of Students with Pending Requests	
90
		
30	GUI for Manage Freshmen Document Submissions Can Verify, Update and Add Optional Remarks Instructions 	
91
		
31	Pseudocode for Admin That Manage Freshmen Document Submissions Can Verify, Update and Add Optional Remarks Instructions 	

92
		
32	GUI for Generate Descriptive Data Analytics on Document Type Distributions	
93
		
33	Pseudocode for Admin That Generate Descriptive Data Analytics on Document Type Distributions	
94
		
34	GUI for Generate List of Students with Incomplete Submission by Program and Institute	
95
		
35	Pseudocode for Generate List of Students with Incomplete Submission by Program and Institute	
96
		
36	GUI for Admin Module That Manage Document Requests Can Update Requests Status	
97
		
37	Pseudo Code for Admin Module That Manage Document Requests Can Update Requests Status	
98
		
38	GUI for Admin Module That Assign Release Date for Approved Documents and Notify student via Email and SMS	

99
		
39	Pseudocode for Admin Module That Assign Release Date for Approved Documents and Notify student via Email and SMS	

100
		
40	GUI for Admin Module That Can View Request History	101
		
41	Pseudocode for Admin Module That Can View Request History	
102
		
42	GUI for Admin Module That Generates Descriptive Data Analytics on Request Distribution	
103
		
43	Pseudocode for Admin Module That Generates Descriptive Data Analytics on Request Distribution	
104
		
44	GUI for Admin Module That Generates List of Students with Pending Requests	
105
		
45	Pseudocode for Admin Module That Generate List of Students with Pending Requests	
106




 
LIST OF TABLES


TABLES	TITLE	PAGE
		
1	List of Systems Related to the Study	20
		
2	Hardware Used	35
		
3	Software Used	36
		
4	Respondents of Distribution	       70
		
5	Likert scale of measurement for Functional Suitability, Performance Efficiency, Reliability, Usability, and Compatibility	

72
		
6	Evaluation Ratings from the Respondents Super Admin and Advisory Committee in Terms of the Functional Suitability of the System	

107
		
7	Evaluation Ratings of Respondents Admission Office in Terms of the Functional Suitability of the System	
108
		
8	Evaluation Ratings of Respondents Registrar’s Office in Terms of the Functional Suitability of the System	
110
		
9	Summary of Respondents’ Rating Based on ISO 25010 Software Quality Framework	
113


 
LIST OF APPENDICES


APPENDIX	TITLE	PAGE
		
1	Survey Questionnaire	129
		
2	Tabulated Data 	131
		
3	Acceptance Form 	132
		
4	User Manual	137
		
5	Relevant Code Snippet of RegisTrack	139
		
6	Nomination Form (Outline)	140
		
7	Application for Oral Outline Defense 	141
		
8	Capstone Outline Processing Form	142
		
9	Permit to Conduct 	143
		
18	Photo Documentation 	144








 
CHAPTER I


THE PROBLEM AND ITS BACKGROUND


Introduction


Student records assisted educational institutions in organizing and managing their information more efficiently. They helped institutions by improving efficiency, ensuring transparency, and promoting accountability. Student records served as a comprehensive store of critical information, such as enrollment details. These records were managed and maintained by the assistant registrar, who was responsible for student records. They helped students understand the prerequisites for enrollment and supported administrative activities like document verification, tracking, and certification issuance (Touray, 2021).
According to Mphunda (2022), student records constituted a vital resource for any organization, including colleges and universities. They were important because they provided information needed by decision-makers and promoted accountability. Institutions also maintained a records room specifically for storing student records.
The problem encountered in DSSC's Registrar’s Office was that the manual approach to tracking student compliance and processing online requests was inefficient and prone to errors. This led to delays in identifying students with unsubmitted requirements and notifying them promptly. Staff had to manually review records to find students who had not submitted necessary documents, a time-consuming process that often resulted in occasional oversights. Additionally, relying on manual methods for document verification, request tracking, and requirement validation created data management challenges and affected service efficiency, particularly in assessing freshmen submissions and processing online requests, which required specialized attention for timely and accurate handling.
To address these challenges, the project introduced the development of a web-based platform designed to automate the submission and verification of required documents in the admission office and the management and tracking of student requests in the registrar office.
The system provided students with real-time access to their submission status, while registrar staff could efficiently track, validate, and manage documents and requests. The advantages of electronic document management included saving time, reducing manual errors, and making better use of physical space and technology (Ragimova et al., 2020). Additionally, the researchers aimed to integrate data analytics into the document submission and compliance process. Data analytics provided an intelligent solution by automating the identification of students with incomplete requirements and analyzing trends in document submissions and requests. By leveraging data analytics, the admission and registrar offices could improve decision-making, enhance operational efficiency, and ensure timely and accurate management of student records.

Objectives of the Study


Generally, the project aimed to develop a comprehensive and effective solution in the form of RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics.
	Specifically, the web-based system should be able to: 
	Develop a super administrator account with the following functionalities:
	Create and manage administrator accounts and their privileges;
	Track freshmen document submissions; 
 1.1.2   Generate approved submissions;
	Track online request transactions;
	Generate descriptive data analytics;
	Document type distribution;
	Requests distribution;
	Generate list of students with incomplete submission by program and institution;
	Generate list of students with pending requests;
	Develop an admin submissions page with the following functionalities:
	Verify documents;
	Update document status;
	Add optional remarks or instructions;
	Generate descriptive data analytics;
	Document type distribution;
	List of students with incomplete submissions by program and institute;
	Develop an admin requests page with the following functionalities:
	Update request status;
	Assign release dates for approved documents;
	Notify students via email and SMS;
	View request history;
	Generate descriptive data analytics;
	Requests distribution;
	List of students with pending requests;
	Evaluate the system in terms of;
	Functional Suitability;
	Performance Efficiency;
	Usability;
	Reliability; and
	Compatibility; 

Scope and Limitations


This study was conducted at Davao del Sur State College (DSSC), and RegisTrack, a web-based system, was developed to make it easier to track and monitor document submissions and manage online requests. The system was used by the Admission Office to handle student submissions of required documents more efficiently and by the Registrar’s Office to manage and track student requests while providing real-time updates about their status. Admins in the Admission Office were responsible for managing document submissions from freshmen and transferee students. They checked the submitted documents for accuracy, updated their statuses, and monitored which students still had missing submissions. Another group of admins in the Registrar’s Office handled online requests, allowing them to track which students had made requests and update them once their documents were ready for claiming. RegisTrack allowed reports to be exported in PDF format, making documentation easier to organize.
RegisTrack included a Super Admin page, which enabled higher-level users to track document submissions, monitor online request transactions, manage admin roles, and generate descriptive analytics. Super Admins could also view student submission records and export PDF reports. The admin page helped with document verification, status updates, adding remarks, and tracking submissions in the Admission Office. Other admins in the Registrar’s Office managed online document requests, including updating request statuses, assigning release dates, notifying students via email and SMS, and tracking request histories. To help decision-making, RegisTrack used descriptive analytics, providing reports on the frequency of document submissions and requests. It also supported PDF report generation for organized record-keeping.
Even though RegisTrack had many benefits, it had some limits. The system was only for freshmen and transferee students and did not include academic records. It also needed a stable internet connection for updates and notifications, which could be a problem in areas with weak signals. Despite these limits, RegisTrack was designed to improve document management for Davao del Sur State College (DSSC), especially in the Admission Office for required documents and the Registrar’s Office for handling student requests.

Significance of the Study


The development of RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics, was highly significant for the Registrar’s Office. It aimed to address the challenges faced by administrators in managing enrollment submissions and online requests. The system allowed staff to easily track and monitor student submissions, making the process faster, more organized, and less manual. The significance of this study can be understood through the following:
Admission Office. The admission office will be able to use the system to monitor whether students have submitted their documents on time. It is expected to help them track progress more easily and reduce the need for manual checking.
Future Researchers. Future researchers could use this study as a basis for improving student record management and compliance systems. It served as a guide for developing better and more efficient academic systems.
Registrar’s Office. The Registrar’s Office will likely find it easier to verify and process student requests, ensuring their accuracy. The system is expected to help reduce errors and speed up the request verification process.
Researchers. Other researchers may use this study as a reference for future research on student records. The system’s data could provide insights that may help improve document management and record-keeping in schools.

Definition of Terms


This study included terms that were commonly used in its context.
Admission Administrator. In this study, this refers to the personnel in the Admission Office responsible for monitoring and verifying student document submissions. The administrator ensured that all required documents were submitted on time, tracked the progress of each submission, and verified the completeness and validity of the documents to meet the school’s standards.
Approved. In this study, this refers to when the admin for submission had reviewed and accepted the submitted document. It was marked as valid, and no further action was needed.
Data Analytics. In this study, this refers to the visual tools, such as charts and graphs, that showed real-time data on the number of pending, rejected, and approved documents. These helped the registrar easily track and monitor student submissions.
Document Submission. In this study, this refers to the process where students uploaded the necessary documents to the RegisTrack system. These included good moral certificates, medical certificates, drug test results, and other school requirements.
Document Verification. In this study, this refers to the task performed by the admission administrators, where they checked if the submitted documents were complete, valid, and met the school’s standards.
Freshmen Students. In this study, this refers to first-year college students who were new to the school. They needed to submit several required documents. These included their birth certificate, report card, good moral certificate, and medical certificate. Submitting these documents was part of the enrollment process.
Inactive. In this study, this refers to the status of an account that was temporarily disabled. It was not allowed to use the system during that time. Inactive admins could not access important features. They were unable to manage document submissions or requests. Their access was restored only after the account was reactivated.
Invalid. In this study, this refers to a document that had been reviewed and rejected. It was marked invalid because it was wrong, blurry, or did not follow the submission rules. The registrar found errors or missing details in the file. Students were asked to resubmit a correct version. This process helped maintain the accuracy of all submitted documents.
Missing. In this study, this refers to a student who had not submitted their document request. The document was still required for their record. It needed to be submitted to complete the process. The system marked the request as missing. The student was reminded to upload the needed file.
Notification. In this study, this refers to alerts or messages that were sent by the system. They informed students when their documents had been approved. These messages helped students know the status of their requests. Notifications were sent through email or SMS. This feature kept students updated about their document progress.
Online Request. In this study, this refers to a feature that allowed students to request help through the system. It was used to ask for specific school documents. Examples included copies of the COR or COG. Students no longer needed to visit the office personally. This feature made the request process easier and faster.
Pending. In this study, this refers to a document that had been uploaded by the student but was still waiting for the registrar to review and verify it.
RegisTrack. In this study, this refers to a web-based system that was designed to help the school registrar. It helped monitor freshmen document submissions and online requests. The system made the process faster and more organized. It was used to track, verify, and approve student records. Overall, it made record management easier for the registrar’s office.
Registrar Administrator. In this study, this refers to the personnel in the Registrar’s Office responsible for managing and verifying student document requests. The administrator handled the processing of requests, updated their statuses, assigned release dates for approved documents, and ensured that all requests were accurate and properly documented.
Super Admin. In this study, this refers to the highest-level user in the system. This person had full access and tracked all system modules. They managed admin accounts, monitored documents, and reviewed requests. The Super Admin ensured that all processes were running smoothly. They had control over the system’s overall operation.
Transferee. In this study, this refers to a student user who had previously studied at another school and transferred to the current one. In RegisTrack, transferees were required to submit documents like the Transcript of Records and Honorable Dismissal. These documents were tracked, validated, and monitored through the system. The process ensured that all records were complete and accurate. It also helped the registrar verify the student’s transfer details efficiently.



 
CHAPTER II


REVIEW OF RELATED LITERATURE AND STUDIES  


Related Literature


In this chapter, previous research papers related to the subject of the study were discussed. The aim was to analyze and compare the findings of published literature to establish a strong framework and a well-supported hypothesis for developing a web-based document submission and verification system for freshmen students with data analytics. The following review and research summary helped in carrying out the study.

Literature Map of the Study 


A literature review, or review of related literature, is a comprehensive evaluation and synthesis of existing scholarly research and publications on a specific topic. It serves multiple purposes, such as establishing a theoretical framework, identifying gaps in research, providing context and justification for a new study, preventing duplication of efforts, critically assessing previous studies, supporting or refuting hypotheses, and informing research design and methodology. Essentially, it helps researchers grasp the current state of knowledge, pinpoint areas for further investigation, and build upon existing work.
 
Figure 1. Literature Map of the Study


Data Analytics
Data analytics is a vital tool that is emerging to bridge learning gaps across all education. With this the institutions can improve teaching strategies, personalize learning, and track the student progress. They can make better decisions about curriculum and resources for the reason that they have access to large amounts of data such as demographics, engagement metrics, and performance data (Parivara, 2025). In relation to this, Ang et al. (2020) state that large amounts of data are helpful to improve education. Different types of analytics are needed to help predict student needs, improve learning, and to recommend materials. 

Prescriptive Analytics
Manly (2024) states that 37 institutional stakeholders (such as faculty and staff) assessed the use of prescriptive analytics to anticipate student outcomes in different situations. The results showed that learning analytics could provide valuable academic support by recommending tutoring and other learning improvements. Even though some did not fully agree, most stakeholders recognized the potential benefits of this. Additionally, Ramaswami et al. (2022) state that prescriptive analytics not only predicts student performance but also provides specific, data-driven recommendations to help students achieve better results. 

Predictive Analytics
Many institutions are adopting advanced, data-driven solution focused on analysis, known as Predictive Analytics, more specifically Learning Analytics. The purpose of devising analytics in education is to discover trends and patterns using numerous amounts of historical data to predict the future of students’ success (Shafiq et al., 2022). Similarly, Rahman et al. (2023) emphasize that applying predictive analytics in education can be very beneficial. 

Descriptive Analytics
Descriptive analytics provide insights into behavioral trends and potential predictors for positive outcomes. It enables us to uncover patterns and differences within the data (Cheppala, 2024). Likewise, a study by Susnjak et al. (2022) states that descriptive analytics highlight snapshots of variables of interest. They convey information about trends and the current status relative to other identified measures. Additionally, Susnjak et al. (2022) mentioned that descriptive analytics are the simplest form of insights to extract from data, and while useful, have a limited utility.

Data Mining
Educational data mining is an emerging interdisciplinary research area involving both education and informatics (Batool et al., 2023). In the study published by Staneviciene et al. (2024) data mining are data analysis-oriented processes that require the organization of “raw” data, and it should be noted that data mining should not be equated with statistics. In a related project, Mengash (2020), stated that by applying data mining techniques, institutions can identify students in risk situations very early, which will help decision makers to give them more attention and to build a strategic plan to improve their academic performance.

KPI Tracking
Throughout the past years, academic accreditation has increasingly highlighted the importance of data-driven accountability, making key performance indicators (KPIs) crucial for demonstrating institutional effectiveness and educational quality (Alomary, 2020). KPI (Key Performance Indicators) enhances data accuracy, reducing administrative burden, and fostering collaboration among faculty and administration (Mondal, 2025).

Data Visualization
In the past few years, visualization techniques, methodologies, and application have reached new heights of advancement such that many businesses and organizations distinguish them as a primary means of analyzing and interpreting data (Asamoah, 2022). Data visualization transform data into visual representatives such as graphs, diagrams, charts and similar things, and enable assessments and resolutions in many professional fields, as well as in public and economic areas (Chang et al., 2024).

Distribution Visualization
In today’s world, visuals play a crucial rule in communication, particularly in research. The importance of clear and impactful visuals has become more important because of the availability of software and digital distribution. However, visuals that show data distributions are powerful but often underused. The box plot is one of the most common distributional visuals, it summarizes five key data points in a single figure. While often used in early data exploration, the histogram is another useful tool for revealing patterns in data (Midway, 2020). 
Additionally, Armah (2025) states that among the numerous types of graphs, histograms effectively reveal the distribution of values within a data set, particularly the skewness and the presence of outliers. Even though histograms are usually used in books and media, research revealed that many people have difficulties understanding this. Students often misinterpret scales, axes, and the shapes of distributions, leading to mistakes in reading the data correctly.


Geographical Visualization
The transformation bought by digital applications featuring geospatial technology tools has created interactive ways for students to deepen understanding of history, civics, economics, and geography using data visualization, infographics, digital mapping project, multimedia presentation, and spatial reasoning (Theobald & Evans, 2025). A dashboard with maps and spatial data helps people visualize geospatial information interactively. Users can interact with maps and charts by zooming in and out, filtering, and exploring data in different ways. Since these dashboards are online, they can be accessed from anywhere with an internet connection (Gonzalez et al., 2025).

Interactive Dashboard
In the study of Aryaman et al., (2024), showed that in the field of educational assessment the interactive dashboard truly helped the students to self-track their progress and have real-time monitoring. The students then mentioned that visual and interactive features of the dashboard is very crucial in helping them see their learning pathways. Likewise, Ganesan et al. (2024) mentioned that the dashboard visualizes several analytics and charts to support informed decision-making.
Related Studies


This section analyzed the existing studies on the topic in relation to a specific research problem. The findings of these existing studies were extensively analyzed and compared.

List of Systems Related to the Study


Systems that were relevant to this study were discussed and compared in this section.

Table 1. List of Systems Related to the Study
Name of Systems	Author/
Year	Description	Strength	Weakness	Application
Smart Office Document Management System with Descriptive Analytics and SMS Alerts	(Reyes & Origines, 2024)

	A system for managing office documents with analytics and SMS notifications.	Can generate analytics and send SMS alerts for document updates.	Limited to office document management; does not include student records.
	Website
Design and Implementation of a Web-Based Document Management System	(Alade, 2023)
	A web-based system for storing, organizing, and managing 	Provides secure storage, easy retrieval,	Focuses only on document storage and management; does not	Website
		digital documents.
	and efficient
document	include advanced features	
Continuation from Table 1
 
	 


	 	organization.	like verification or analytics.
	
Digital Documents Verification System
	(Divya Shree et al., 2022)
	A system for verifying digital documents to prevent fraud.	Ensures document authenticity and security.	Limited to document verification; does not include record management	Website
					
Online University Management System	(Tangkudung et al., 2024)	A website-based platform for streamlining university operations, including course registration, attendance tracking, grade management, and communication tools.
	The system organizes tasks efficiently, works on any device via the web, and is easy to use.	The system needs the internet to work, which can be a problem in areas with weak signals. It also faces security risks and does not have offline access.	Website

Student Registration and Records Management Services towards Digitization	(Falolo et al., 2022)	A system that helps digitize student registration and record-keeping.	Can register students and manage their records efficiently.	Focuses only on registration and records; does not handle verification.
	Website
Continuation from Table 1
Data Analytics on Web-Based Document Notification 	(Reyes & Origines, 2024a)	A system that integrates data analytics with	Uses data analytics for better document	Focuses only on notifications does not	Website
System		document notifications to enhance document tracking and retrieval.	insights and tracking.	include document storage or verification.	
					
Web-Based Students' Record Management System for Tertiary Institutions	(Kanayo et al., 2019)	A web-based system for managing student records, including course registration, results processing, clearance, and transcript generation.
	Can handle course registration, grade processing, and transcript requests efficiently.	Limited to academic records; does not include document verification or broader student services.	Website
Document Management System With Tracking And Monitoring In Manuel S. Enverga University Foundation-Candelaria Inc	(Hermosa et al.,2023)	A digital system designed for tracking and monitoring documents to improve record management in an educational institution.
	Can track documents in real-time and enhance monitoring for better record organization.	May have limited scalability for larger institutions with complex document workflows.	Website
Continuation from Table 1
					
BEYOND THE ARCH: a web and mobile alumni record verification	(Samson et al., 2024)	A web and mobile system for verifying alumni records at the 	Can verify alumni records online and via	Limited to alumni records only; does not cover	Website & Mobile App
system for the University of Santo Tomas Office of the Registrar		University of Santo Tomas.	mobile.	student registration.	
					
Optimizing Educational Institutions: Web-Based Document Management	(Triyana & Fianty, 2023)	A web-based system for managing documents in schools.	Allows institutions to store and organize documents digitally.	Limited to document management; does not include verification features.	Website




Table 1 lists different connected websites carefully chosen to give a full understanding of the topic. Some of these websites describe software systems. Each entry in the table provides an overview of the system, its main features, benefits, and weaknesses.
Reyes and Origines (2024) developed a smart office document management system that integrates descriptive analytics and SMS alerts for efficient file handling. This system streamlines document tracking and facilitates automated reminders. However, its functionality is limited to office files and does not extend to managing student records or document authentication in educational institutions.
A study by Alade (2023) explained that another system helps organizations store and manage digital files. It makes it easier to access important documents and prevents them from being lost. However, it is only for storage and does not include document verification or data analysis, which schools need to check records and gain insights. On the other hand, some systems focus on document verification. In the study by Divya et al. (2022), they developed a digital document verification system that checks if documents are real. This prevents fraud and improves security. However, it does not store or manage records, so institutions still need another system to organize documents.
Moreover, Tangkudung et al. (2024) develop an online management system for universities to help with course registration, attendance tracking, grade management, and communication. The system makes academic tasks easier and allows access from any device with an internet connection. Its strengths include improved efficiency and accessibility for students and staff. However, it does not have key administrative features, such as online request management and automatic document verification for freshmen. The system also relies fully on internet access, which may cause problems in areas with weak connections. Security risks and limited administrative functions are other weaknesses compared to more complete university management systems.
Likewise, some systems focus on student registration and records management services. According to Falolo et al. (2022), a system was introduced to help schools switch from paper-based to digital student registration. This reduces paperwork and improves organization. But it does not have a verification feature, so it cannot confirm if student records are real.
Additionally, Reyes and Origines (2024) deveoped a web-based document noticcation system with analytics to improve document tracking. It has a simple dashboard with count metrics, bar graphs, and tables to help institutions track records. Yet, it only focuses on tracking and analyzing documents and does not include storage or verification, which are important for schools. Also, Kanayo et al. (2019) stated that they developed a web-based system for colleges to manage student records, including course registration and transcripts. This helps organize student data. However, it does not include document verification or other school services, such as tracking missing requirements.
Furthermore, Hermosa et al. (2023) stated that they developed a document management system with tracking. The platform allows document sharing, tracking, and collaboration. Users can trace sent files with a code, and completed transactions are stored. However, it may not be ideal for large institutions with complex document processes since handling a high number of records could be difficult. In the study by Samson et al. (2024), a web and mobile application was created to make alumni record verification faster and better at the University of Santo Tomas. It includes document scanning, ticketing, certificate generation, user management, event scheduling, and data tracking. The system connects with the university's alumni database from 2004 onwards to improve security and prevent fake credentials. However, manual verification is still needed for data privacy and older records. Also, it is only for alumni and does not support student registration or other school records.
Lastly, there is an online document management system for educational institutions. A study of Triyana & Fianty (2023) explained that the system helps schools store and manage documents efficiently. However, it does not have a verification function, which is necessary to confirm the authenticity of documents.


Concept of the Study


The conceptual framework of the study was the researcher’s road map that illustrated the key concepts, variables, and their connections, as well as how ideas were structured to accomplish the project’s objective and provide an explanation. The main elements of this framework were clearly depicted in Figures 2.1 and 2.2, which also described the information flow within it.
 
Figure 2.1. Conceptual Framework of the Study (Super Admin)
 
Figure 2.2. Conceptual Framework of the Study (Admin)

The conceptual framework, as shown in Figures 2.1 and 2.2, was aligned with the system’s objectives by explaining the functions of both the Super Admin and Admin roles in the RegisTrack Web Portal. The Super Admin (Figure 2.1) was designed to oversee all system operations. This included tracking freshmen document submissions, monitoring online request transactions, managing admin accounts with specific roles such as Document Submission and Document Request and generating data analytics reports. The analytics feature allowed the Super Admin to view document type and request distributions, see lists of students with incomplete submissions by program and institution, and check pending requests. The Super Admin also had the option to export PDF reports of approved submissions for record-keeping and reporting.
As shown in Figure 2.2, the admin role was divided into two types: Admin for Document Submissions and Admin for Document Requests, each handling specific tasks. The Admin for Document Submissions managed freshmen documents by verifying files, updating document statuses, and adding remarks or instructions after review. This admin also generated data analytics, such as document type distribution and lists of students with incomplete submissions. Meanwhile, the Admin for Document Requests handled student requests by updating their status, setting release dates for approved documents, notifying students through email and SMS, and viewing request history. This admin also produced analytics reports, like request distribution and pending request lists.
Overall, the RegisTrack Web Portal served as a central system that supported both monitoring and processing tasks. It made document handling easier, improved verification accuracy, sent timely notifications, and helped in making data-based decisions.





 
CHAPTER III


METHODOLOGY


This chapter thoroughly explained the procedures and methods that were utilized in the study. It provided an extensive explanation of the capstone location, system design, data gathering procedure, data analysis, and diagrams used in the study.

Capstone Locale


This chapter describes the study’s location and its relevance to freshmen enrollment.
Figure 3 showed the map of Davao del Sur State College (DSSC) in Matti, Digos City, Davao del Sur. The institution processed numerous online requests and document submissions, especially during freshmen enrollment. Students submitted the required documents, which registrar personnel verified before finalizing enrollment. Since this process happened frequently, DSSC was chosen as the best location to implement and test the system. By integrating online request monitoring and document submission tracking, the system aimed to simplify verification, reduce delays, and improve accessibility for both students and staff. Testing it in an actual enrollment setting ensured that the system met real-world needs and enhanced efficiency in document handling.
 
Figure 3. Research Locale of the Study


	As shown in the figure above, the system will be utilized at this site. This location is where the testing and implementation of the system took place.

Research Design of the Study


A research design involves conceptualizing, planning, and defining a system's architecture to ensure it meets specific goals and requirements. Figure 4 shows the Rapid Application Development model, which provides a quick and adaptable way to create and refine a project throughout its stages.
 
Figure 4. Rapid Application Development of the Study


The researcher used the figure as a reference while conducting the study to ensure accurate analysis and implementation. This approach provided valuable insights and enhanced the study’s effectiveness.
The RegisTrack system was developed using the RAD (Rapid Application Development) model, as shown in the figure above. It included four phases. The first phase, “Requirements Planning,” focused on gathering requirements and defining the project scope with the administrator of the Registrar’s Office. This step collected important details such as users’ needs and preferences, registration rules and policies, and the types of data to be stored and processed.
Next was the "User Design” phase, where wireframes and prototypes were created to visualize the system’s interface and features. This phase also involved designing the database to organize and structure data storage effectively. It ensured that the system’s layout and functions matched the requirements identified in the first phase.
The third phase, “Construction,” involved turning the designs from the User Design phase into working software components. Finally, the “Cutover” phase launched the RegisTrack system, making it available for users. Together, these steps ensured that the system was completed on time and adapted to the needs of the Registrar’s Office.

Requirements Planning


Requirements planning and analysis is a key phase that ensures the project's success by gathering and understanding user needs, defining the scope, and identifying necessary resources. This phase helps set clear goals for the project and determines the strategies and tools required to develop the system efficiently. By focusing on these elements, the proponent ensures that the project is well-structured and can address challenges effectively, resulting in a system that meets user expectations and achieves its intended purpose.

System Requirements
This section thoroughly presented the technical requirements that were needed in developing RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics. System requirements referred to the essential tools that were required to effectively develop the system. A full understanding of the needed software, hardware, and other parameters was important because it ensured that all necessary resources were available and usable for the intended function of the system.
 	Hardware Used. The hardware requirements represented the essential minimum specifications needed for a computer to efficiently run the application or perform specific tasks. These included the processor speed, memory (RAM), storage capacity, graphics capability, and other important hardware components. Understanding and following these specifications ensured optimal performance and reduced the chances of system errors or lags. Failing to meet these requirements led to performance issues and system instability. Table 2 presented a summary of the key hardware components that were necessary for the system’s development.
Table 2. Hardware Used
Hardware	Specification
Laptop
 		Core i7-6500U Processor
	2.50 GHz
	8GB RAM


As shown in Table 2, the hardware presented was used to achieve the study’s expected output. Better hardware components ensured that the application ran efficiently. Mid-range hardware was utilized during the development to guarantee that the system was established properly.
 	Software Used. The characteristics, performance, and functions were defined based on what the system needed to achieve its specific objectives. These requirements ensured that the system worked properly and efficiently. Table 3 provided an in-depth description of the software requirements used in developing the RegisTrack system.

Table 3. Software Used
Software	Specification
Operating System	Windows 11	 
Integrated Development Environment (IDE)
	Visual Studio Code	 
Database Management	MySql Workbench	 
Server Environment	XAMPP	 
Programming Language	PHP	 


The software that the system’s proponent used was listed in the table for the software requirements. One of the factors that influenced the study’s results was the software’s capability. The objective of the system and the proponent’s skills were carefully considered after proper planning had been done to decide which software to utilize. A computer running Windows 11 was used for programming tasks, providing a stable and secure environment for development. Visual Studio Code served as the primary integrated development environment (IDE), offering a lightweight yet powerful tool for coding, debugging, and testing. MySQL Workbench was used for database management, allowing efficient storage, retrieval, and organization of student records. XAMPP was used as a local server environment to host and test the PHP-based system. The system was developed using PHP, a widely used programming language for web applications, ensuring dynamic content generation and seamless integration with the database.
	Data Gathering. The data gathering process was an organized way of collecting information to achieve the goals of the study. It included finding sources, choosing methods to collect data, setting clear objectives, creating tools, completing tasks, and ensuring the data was accurate for analysis or for making informed decisions. Below were the steps in the data gathering process.
	Data Collection. The researcher collected datasets from the Registrar’s Office, which contained records related to student document submissions and requests. These datasets consisted of structured collections of data that reflected essential information used for the development and functionality of the RegisTrack system.
	Data Table. The data of RegisTrack was collected in a tabular manner and sourced from the registrar’s head, staffs, and admission's staff. To access the system, users were required to log in and provide their personal information. Table 5 outlined the required information that all users had to provide to gain access to the system.
 
Figure 5. Admin Submission Assets Data Table


As shown in Figure 5, the Admin Submission Assets Data Table stores essential information related to document submissions handled by administrators within the RegisTrack system. It includes key fields such as the SubmissionID, StudentID, DocumentType, FilePath, Status, DateSubmitted, and Remarks. These fields allow administrators to verify, update, and track each student’s document submission efficiently. The table 5 supports monitoring incomplete or pending submissions and aids in generating analytical reports for compliance tracking. Each record is uniquely identified by the SubmissionID, which serves as the table’s primary key to maintain data consistency and ensure accurate document management across the system.

 
 
Figure 6. Admin Submission Assets Data Table


As shown in Figure 6, the Admin Submission Assets Data Table serves as the primary repository for managing and recording all freshmen document submissions in the RegisTrack system. It contains essential fields such as SubmissionID, StudentID, DocumentType, FilePath, Status, DateSubmitted, and Remarks. These fields enable administrators to verify documents, update their statuses, and provide feedback or instructions when necessary. The table also facilitates efficient monitoring of completed and pending submissions, ensuring transparency and accuracy in document processing. Each entry is uniquely identified by the SubmissionID, which functions as the table’s primary key to maintain data integrity within the system.
 
Figure 7. Admin Request Assets Data Table

As shown in Figure 7, the Admin Request Assets Data Table is designed to store and manage all document requests submitted by students within the RegisTrack system. It includes key fields such as RequestID, StudentID, RequestType, DateRequested, Status, ReleaseDate, and Remarks. These data fields allow administrators to monitor the progress of each request, update its status, assign release dates, and provide feedback or notifications to students. The table also supports data analytics generation, enabling the system to display request distribution and identify pending transactions. Each record is uniquely identified by the RequestID, which serves as the table’s primary key, ensuring accurate tracking and efficient request management.
User Design


After completing the analysis, the system design was presented. This stage outlined how the system was built based on the findings from the analysis. It included the system framework, entity relationship diagram, data flow diagram, use-case diagram, graphical user interface, and flowchart. The proposed system designs and system structure were as follows:

Diagrams
A diagram is a clear and simple way to visually show information, ideas, relationships, or processes. It helps explain facts, outline steps, and solve problems. Because of this, diagrams must be carefully created and chosen to properly present the study results. A well-designed diagram helps users quickly understand complex concepts and see how different parts of the system connect.  
To make sure the diagram effectively delivers its message, it is important to consider the audience and purpose. The design should focus on simplicity and clarity, avoiding unnecessary details that may cause confusion. A well-structured diagram not only makes information easier to grasp but also improves the presentation, keeping the audience focused and engaged.
 	Use Case Diagram. A use-case diagram is a simple way to show how people interacted with a system. Figure 8 presented the use-case diagram for RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics. This diagram helped explain how RegisTrack functioned.
RegisTrack was a web-based system that helped schools manage the submission and verification of documents for freshmen students and transferees. It was developed to make the process easier and more organized for both students and administrators. As shown in the figure below, RegisTrack allowed users to track student document submissions, manage different types of requests, and view important data through reports and analytics. This helped schools ensure that everything was processed smoothly and on time.
The Super Admin was the highest-level user in the system. They were in charge of all operations and had full control. Their responsibilities included tracking student submissions, checking the history of request transactions, and generating reports. These tasks helped the Super Admin keep the system safe and running efficiently. By analyzing data, they were able to make better decisions to improve the system. Admins, on the other hand, handled the daily tasks of the system. Their job was to check and approve student accounts, review submitted documents and process online requests. There were two types of Admins, each with specific responsibilities. One Admin was responsible for managing freshmen document submissions. This included verifying documents, updating document statuses, and adding optional remarks or instructions when needed. They also generated descriptive data analytics, such as document type distribution and lists of students with incomplete submissions categorized by program and institution. The other Admin handled student document requests. This involved updating request statuses, assigning release dates for approved documents, and notifying students through email and SMS. They also viewed request histories and generated analytics, such as request distributions and lists of students with pending requests. This ensured that all students completed their document submissions properly and within the given time frame.
 
Figure 8. Use Case Diagram of the System


 	Entity Relationship Diagram of the System. An entity relationship diagram is a diagram that depicts the link between databases. The figure 8 shows the entity-relationship diagram of Registrack: A Web-Based Document Submission and Verification System for Freshmen Student with Data Analytics.
 
Figure 9. Entity-Relationship Diagram of the Study


As illustrated in Figure 9, the Entity Relationship Diagram (ERD) presented the structural relationships among the core datasets of the RegisTrack: Web-Based Document Submission and Verification System. The system was centered on the Users table, which served as the main entity containing login credentials, role assignments, and verification status for all users, including students and administrators.
Supporting user details were stored in the User_Profile and Address tables, which contained personal, contact, and demographic information such as names, birthdates, gender, and addresses. The Roles table defined the type of access and permissions that were assigned to each user, ensuring proper system authorization and role-based management.
The Student table linked users to their corresponding academic information and was connected to the Program and Institution tables. This structure allowed the system to organize students according to their academic programs and institutional affiliations, enabling efficient record tracking.
Document management was implemented through the Requirements, Student_Submissions, Document, and Document_Requests tables. The Requirements table listed the mandatory documents for registration and compliance, while the Student_Submissions table recorded the actual files that students submitted, along with their statuses, remarks, and the verifying administrator. The Document_Requests table handled official document requests, capturing details such as purpose, approval status, release dates, and claim notifications.
Administrative operations were managed through the Admin table, which identified users with administrative privileges and their specific task roles, and the Password_Reset_Tokens table, which securely handled account recovery processes.
Foreign key relationships interconnected these entities, maintaining referential integrity across the system. For instance, the verified_by and approved_by fields linked document transactions to their respective administrators, while the connections among Student, Program, and Institution represented the academic hierarchy of each enrolled student.
 	Data Flow Diagram of the System. A data flow diagram depicts the flow of data across the system. The figure 10.1 shows the data flow diagram of Registrack: A Web-Based Document Requirements and Verification System for Freshmen Student with Data Analytics.
 
Figure 10.1. Data Flow Diagram for Super Admin Activity
As shown in the figure above, the diagram illustrated the system's core processes and data flows, focusing on the Super Admin's centralized control over the platform. It began with System Authentication, where the Super Admin logged in using an email and password, with credentials verified through the Admin Account data store. Once authenticated, the Super Admin proceeded to Track Freshmen Document Submissions, retrieving student submission details from the Student Submissions database. The Super Admin also tracked Online Request Transactions, accessing request information from the Document Requests repository. Furthermore, the Super Admin had the ability to Assign Specific Admin Roles, with updated role settings stored in the Admin Roles database. Lastly, the Super Admin generated Reports and Analytics, enabling the export of frequency and distribution reports of student submissions for comprehensive analysis. The diagram clearly depicted how the Super Admin interacted with each component to ensure efficient document tracking, role management, and data-driven reporting.
 
Figure 10.2. Data Flow Diagram for Document Submissions Admin
 Activity


As seen in Figure 10.2, the diagram provided a clear illustration of the data flows and processes involved in managing student document submissions. It showed how the admin logged in through system authentication, managed student submissions, and updated document statuses. The admin also inputted remarks and generated descriptive data analytics, such as document type distribution and lists of students with incomplete submissions by program and institution. The diagram highlighted the structured interaction between the admin and various system modules, ensuring accurate tracking, efficient document handling, and organized record-keeping.
 
Figure 10.3. Data Flow Diagram for Document Requests Admin
 Activity


As seen in Figure 10.3, the diagram illustrated the data flows and processes involved in managing student document requests. It demonstrated how the admin logged in through system authentication, handled student requests, updated request statuses, and assigned release dates for approved documents. The admin was also able to notify students via email and SMS, viewed the request history, and generated descriptive data analytics, such as requests distribution and the list of students with pending requests. The diagram emphasized the structured interaction between the admin and various system modules, ensuring accurate tracking, efficient processing, and organized record management.
		Flowchart of the System. A flowchart is a diagram that shows how the system’s workflow or process flows in sequential order. As shown in the figures, the system’s flowcharts outline the processes for different user roles, including Super Admin, Freshmen Document Submissions Admin, and Student Document Requests Admin. Each role has its own tasks and level of access, which helps keep the process organized and secure.
Figure 11.1 showed the steps that the Super Admin followed. This included tracking students’ freshmen document submissions and checking the status of document requests. The Super Admin assigned admin roles, managed tasks, and generated reports. These reports helped the school identify patterns, such as how many students submitted documents, which documents were often requested, or how many requests were still pending.
Figures 11.2 and 11.3 showed the tasks performed by the Admins. Freshmen Document Submission Admins checked and updated students’ documents, added remarks for invalid documents, and tracked which students had missing submissions. Student Document Request Admins handled student requests, updated the status of each request, assigned pickup dates, and notified students through email or SMS. They also viewed request history showing which documents were requested the most and how many requests were still pending. These reports could be saved as PDF files for official use. The system helped the school stay organized, respond to student needs on time, and improve the management of student documents and requests.
    
Figure 11.1. Flowchart of the System
 
Figure 11.2. Flowchart Connector A for the Admin Activity

 
Figure 11.3. Flowchart Connector B Continuation for the Admin 
         Activity
 	Operational Framework of the System. The operational framework described the important steps, activities, and resources needed to complete a program, project, or policy from beginning to end. It also clearly explained what each person or team was responsible for. This kind of plan was helpful because it ensured everyone involved in the project knew what to do and worked together toward the same goal. It improved communication, avoided confusion, and helped the team use time and resources more effectively. During this stage, the design of the system had already been planned. The developers then began turning the design into a working system. They followed the plans and ideas given by the researchers to create a system that met the needs of both the students and the school administrators. This process included setting up features such as user login, document submission, verification, and data tracking. 
 	Figure 12 illustrated the operational framework of the Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics. This framework outlined the systematic workflow from project initiation to completion, detailing all necessary steps, tasks, and resources. It began with inputs such as student registration details, submitted documents, and request forms. The system processed these by checking and verifying documents, updating their statuses, adding optional remarks, handling student requests, assigning release dates, sending email or SMS updates to students, and generating reports. These reports included charts on submission trends, request counts, and lists of students with incomplete or pending records. The outputs of the system were clear document records, updated request statuses, sent notifications, and reports. This setup helped make the work of admins easier, kept student records organized, and allowed them to respond more quickly and effectively to student needs.

 
Figure 12. Operational Framework of the Study



Construction


The construction phase of RegisTrack played a crucial role through the adoption of the Rapid Application Development (RAD) methodology. This process included coding, system integration, and rigorous testing to ensure that each feature functioned as intended. The development team collaborated with stakeholders to refine requirements, validate functionality, and optimize user experience. Emphasis was placed on delivering a reliable and efficient system while remaining adaptable to necessary modifications.

Implementation Activities

The implementation phase of the RegisTrack served as a detailed guide that showed how the project was carried out from start to finish. It explained the important steps that were followed, the materials and resources required, the people involved, and the time it took to complete each task. This plan helped everyone understand their roles and responsibilities, ensuring that the project remained organized and on schedule. It also helped in tracking progress and identifying problems early so they could be addressed immediately.
For this project, the implementation plan outlined the necessary actions to successfully develop and launch the RegisTrack system. It included all the important tasks such as system planning, design, development, testing, deployment, and evaluation. Each phase had specific goals and timelines to ensure that the system met its objectives. With this plan, the team worked efficiently, avoided delays, and ensured that the final product was delivered as expected.
Furthermore, the implementation phase emphasized collaboration and communication among all team members and stakeholders. Regular meetings and progress updates were conducted to ensure that tasks were aligned with the project objectives and timelines. Feedback from potential users, such as the Registrar’s Office and Admission staff, was incorporated throughout the development and testing stages, allowing for timely adjustments and improvements. This proactive approach not only enhanced the quality and functionality of the RegisTrack system but also ensured that the final deployment addressed the real needs of its users, promoting smooth adoption and effective utilization of the system once it went live.

 
Figure 13. Flowchart for Super Admin Accounts


Figure 13 shows the Flowchart for Super Administrator Accounts, which illustrates the process flow of managing system operations at the highest administrative level. It begins with the super administrator logging into the system using valid credentials. Once authenticated, the super administrator gains access to core functionalities such as creating and managing administrator accounts, tracking freshmen document submissions, monitoring online request transactions, and generating descriptive data analytics.
The flow continues as the super administrator selects specific management tasks, including verifying approved submissions, exporting PDF reports, and viewing statistical summaries of document and request distributions. The flowchart also outlines decision points for validating actions such as approving or rejecting admin accounts and ensuring data integrity before reports are generated. Finally, the process concludes with the super administrator logging out of the system, ensuring that all administrative activities are securely recorded and updated in the database.
This structured flow ensures that all administrative processes are performed systematically and consistently, minimizing errors and improving operational efficiency. It also provides a clear visual guide for training new super administrators on their responsibilities within the system.
 
Figure 14. Flowchart for Submission Admin Accounts


Figure 14 shows the Flowchart for Submission Admin Accounts, which presents the step-by-step process for managing and verifying freshmen document submissions. The process begins when the submission admin logs into the system using valid credentials. Once authenticated, the admin gains access to the submissions management dashboard, where they can view the list of submitted documents from freshmen students.
The admin then selects a student submission to review and verify. At this stage, the system allows the admin to check the completeness and validity of each document. Based on the evaluation, the admin can update the document status as “Approved,” “Incomplete,” or “Invalid.” Optional remarks or instructions may also be added to guide students in addressing submission issues.
After updating the records, the system automatically saves the changes and updates the student’s submission status in real time. Additionally, the submission admin can generate descriptive data analytics, including document type distribution and a list of students with incomplete submissions categorized by program and institution. The process concludes when the admin logs out, ensuring that all verification actions are securely stored in the system.

 
Figure 15. Flowchart for Request Admin Accounts

Figure 15 shows the Flowchart for Request Admin Accounts, which illustrates the systematic process of handling and managing students’ online document requests. The process begins when the request admin logs into the system using valid credentials. Upon successful authentication, the admin gains access to the request management dashboard, where all submitted student requests are displayed.
The admin reviews each request to determine its current status. Depending on the evaluation, the admin can update the request status to “Approved,” “Pending,” or “Denied.” For approved requests, the admin proceeds to assign a release date for the document and triggers the system to automatically notify the student via email and SMS regarding the document’s availability. This structured process ensures that student requests are processed accurately and in a timely manner.
The system records all updates and maintains a request history log for transparency and tracking purposes. Additionally, the request admin can generate descriptive data analytics, such as the distribution of request types and a list of students with pending requests. The process concludes when the admin logs out of the system, ensuring that all request management activities are securely saved and reflected in the system database.

How the System Worked

This part provided an overview of RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics. It highlighted the system’s core functionalities, emphasizing its role in streamlining the enrollment process, enhancing document tracking, and ensuring efficient verification of student requirements through real-time data insights.
Super Administrator Web Portal:  
	The super admin logged into the system.
	The super admin tracked freshmen document submissions and reviewed student records.
	The super admin exported PDF reports of approved document submissions.
	The super admin generated a list of students with incomplete submissions, by program and institution.
	The super admin monitored online request transactions.
	The super admin generated a list of students with pending document requests.
	The super admin managed admin accounts and assigned role-specific access.
	The super admin appointed Freshmen Document Submission Admins and Student Document Request Admins.
	The super admin viewed descriptive analytics on document type and request distributions.
	The super admin logged out of the system.
Admin Submission Web Portal:
	The admin verified freshmen document submissions and updated their status.
	The admin added optional remarks or instructions to student records.
	The admin generated document submission analytics such as document type distribution.
	The admin generated a list of students with incomplete submissions by program and institution.
	The admin logged out of the system.
Admin Request Web Portal:
	The admin logged into the system.
	The admin updated the status of student document requests and assigned release dates.
	The admin sent SMS and email notifications with release details to students.
	The admin viewed request history for tracking and auditing purposes.
	The admin generated request analytics, including request distribution and a list of students with pending requests.
	The admin logged out of the system.

	Deployment Activities

	The deployment phase of the RegisTrack system involved key steps to ensure its successful implementation. Using the Rapid Application Development (RAD) approach, the system included three main modules: the Super Admin module, the Admin for Document Submission module, and the Admin for Document Request module. This phase ensured that each component was properly installed, configured, tested, and made ready for use. Backup procedures, security measures, and maintenance plans were also prepared to guarantee smooth operation and minimal disruption during deployment.
 	Installation Activities. The installation plan outlines the steps needed to set up the software, hardware, or system and configure it for its intended use. The installation process for RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics includes the following steps:  
Step 1: Obtain a hosting server and register a domain name.  
Step 2: Create a subdomain for the website.  
Step 3: Set up and configure the subdomain.  
Step 4: Set up and configure the database.  
Step 5: Upload the source code to the web hosting server.  
Step 6: Configure the connection string in the Web config file.

 	Maintenance Activities. A maintenance plan was a set of steps and schedules designed to keep the system, software, and hardware working well and to prevent problems. The system followed a preventive, corrective, and improvement-based maintenance approach. 
Step 1: The system was regularly checked and updated to keep the 	     software and its required tools up to date.
Step 2: The system’s performance was monitored, and any problems 	     that could slow it down were identified.
Step 3: Regular backups were scheduled to protect data in case of 	     system failure or downtime.
Step 4: A detailed record was kept for all maintenance activities and 	    updates.
 	Backup and Recovery Activities. A backup and recovery activities was a set of steps used to protect and restore data if the system failed, data became damaged, or unexpected problems happened. The backup process for RegisTrack: A Web-Based Document Submission and Verification System for Student Records with Data Analytics included the following steps:
Step 1: Set a backup schedule to make sure system data is saved regularly and securely.  
Step 2: Assign an employee to manually back up the data every week. 	  Having a specific person handle this task ensures backups are 	  done on time. Delays or missing backups can cause data to be 	   unavailable.  
Step 3: Test the backup files to make sure they can be restored properly. 	  The assigned employee must regularly check that the backup 	    files are complete and working.  
Step 4: Keep copies of the system software and configuration files.  
Step 5: Create a recovery plan that lists the steps to take in case of system failure, data loss, or a cyber-attack.

Cutover


The developer recorded all the steps involved in the backup and recovery process, including detailed procedures, outcomes, and methods used. This stage marked the full implementation of the system. It included data gathering, testing, system transition, and user training. These key activities helped ensure a smooth handover and the successful deployment of the RegisTrack system.

Testing and Evaluation

This phase outlined the techniques and procedures used to test and evaluate the system, with a focus on usability, reliability, and functionality. Results were obtained by computing the mean value. The goal was to ensure the system met users' needs and expectations. This process helped identify areas for improvement, ensuring that the system worked properly and was ready for use in its intended environment.
 	Respondents. During the system testing, four (4) Advisory Committee members, one (1) Super Admin Registrar, three (3) Registrar’s Staff, and two (2) Admission Office Personnel evaluated the system’s functionality. Table 4 presents the distribution of respondents.

Table 4. Respondent’s Distribution
Evaluators	Sample Size
Advisory Committee	4
Super Admin Registrar	1
Registrar’s Staff	3
Admission Office	2
Total	10


	The table 4 shows information about the ten (10) people who evaluated the project. These evaluators include advisory committee members, the super admin registrar, registrar’s staff, and admission office personnel from Davao Del Sur State College. They answered survey questions to check how well the system works, how useful it is, and how reliable it can be. Their feedback will help make the system better.  
 	Sampling and Design Technique. The researcher employed convenience sampling, selecting participants based on their availability and willingness to participate. This method was chosen because it is practical, time-efficient, and suitable for studies where the target respondents are easily accessible.
	Data Gathering Procedure. The phase outlined the procedures and methodologies used to the test system focusing on its usability, dependability, and functionality. These methods ensured that the system’s features worked as intended, its reliability met expectations, and its usability met user requirements 
	The developer secured a Permit to conduct from Research Development, and Innovation (RDI) office to proceed with capstone project. 
	The developer requested permission to evaluate the system 
	The request letter was submitted to the faculty and approved by the department chairman
	The developer gave the respondents a briefing on how to use the system. 
	The developer allowed the end user time to operate the system, and provide feedback through evaluation form.
	The evaluation forms were retrieved after the respondents had completed all the survey questions. 
	The results were evaluated, tabulated and explained

Survey Instruments

A data survey instrument was utilized to gather information from a selected group of individuals in a standardized and structured way. During the evaluation phase, respondents assessed the system’s performance in terms of functionality and reliability using a questionnaire adapted from the International Standard Organization’s (ISO/IEC) Software Product Quality Model 25010, which was modified to fit the project’s requirements. The questionnaire focused on evaluating the Functional Suitability, Performance Efficiency, Usability, Reliability, Compatibility, and Portability of the RegisTrack system for the Registrar’s Office.
 	Likert Scale of Measurement for Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility. In this context, Functional Suitability evaluated how well the system performed its intended functions. Performance Efficiency measured how effectively the system used resources to deliver outputs. Usability assessed how intuitive and easy the system was for users to navigate. Reliability evaluated the system’s ability to perform consistently under specified conditions over time. Compatibility assessed how well the system worked with other applications or environments. Portability evaluated how easily the system could be transferred or adapted to different platforms or settings.
Table 5. Likert scale of measurement for Functional Suitability, Performance Efficiency, Reliability, Usability, and Compatibility.
Mean Range	Descriptive Equivalent	Interpretation
4.51-5.00	Strongly Agree	This measure indicates that the respondents believed all aspects of Functional Suitability, Performance Efficiency, Reliability, Usability, and Compatibility of the system were successfully achieved and free of errors.
Continuation from Table 5
3.51-4.50	Agree	This measure indicates that the respondents recognized the results 
even though the objectives for Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility were not fully achieved, and minor issues such as bugs or malfunctions may still be present.
2.51-3.50	Fairly Agree	This measure indicates that the respondents accepted the results and assumed that the objectives were generally met. However, some aspects of Functional Suitability, Performance Efficiency, Usability, Reliability, and
		Compatibility may not have been completely satisfactory to them.
1.51-2.50	Disagree	This measure indicates that the respondents felt that most of the objectives for Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility were not fully achieved.
1.00-1.50	Strongly Disagree	This measure indicates that the respondents were not confident that the system met the objectives.

The scale ranged from one (1) to five (5), with five representing the highest score and one the lowest. The corresponding ratings were: 4.51 to 5.00 as "Strongly Agree (SA)", 3.51 to 4.50 as "Agree (A)", 2.51 to 3.50 as "Fairly Agree (FA)", 1.51 to 2.50 as "Disagree (D)", and 1.00 to 1.50 as "Strongly Disagree (SD)".  This Likert scale assessed how well the system met user needs and helped identify areas for improvement. It measured the extent to which respondents agreed or disagreed with statements regarding the reliability of "RegisTrack: A Web-Based Document Submission and Verification System for Student Records with Data Analytics".
 	Statistical tools. This method was used to analyze the evaluation and questionnaire responses in the study. The data were compiled and totaled. During the evaluation and interpretation process, the values were calculated by summing all the evaluators’ ratings and dividing by the total number of evaluators. The impact of the system on the evaluators was assessed using a formula and presented through a weighted measure, applying the equation to obtain the mean value.
Equation formula for getting the mean value:   
x ̅=Σx/N
			Where:
			x ̅	 = represents the score
			Σx   	 = represents the sum of all scores from every evaluator
			n	 = represents the total number of evaluators

The mean was used to measure how functional, reliable, and useful the system was. It was employed to determine the extent of Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility. 
CHAPTER IV


RESULTS AND DISCUSSION 


This section gives a clear analysis and discussion of the capstone project "RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students”. It explains the information gathered and connects the findings to the goals and questions of the study. This part is important because it helps form conclusions and gives useful recommendations. The next section presents the specific results of the study.
Super Admin Module That Creates and Manage Administrator
Accounts and Their Privileges

	This module allows the super admin to perform functions that are exclusively available for super admin. Its main purpose is to create and manage administrator accounts and control their privileges. Figure 16 shows the graphical user interface (GUI) of the admin management page, where the super admin can add new administrators, assign roles, and delete. On this page, the Super Admin can view a table listing all admins along with their email, role type, status, creation date, and available actions such as edit and remove.

 
Figure 16. GUI of Admin Management
As shown in Figure 17, the pseudocode of the admin management outlines the process of displaying the admin data. It shows the actual code used for managing admins, which includes creating a table for the admins along with their attributes. It retrieves all the data from the database in the `tbl_admin` table and displays it in the table. The fetched data works together with functions that handle creating and removing admins, which are linked to `admin_actions.php`, and `admins_archives.php`.
FUNCTIONS: Super Admin Module That Manage Admin
BEGIN
    IF userSession DOES NOT EXIST THEN
        Redirect to LoginPage
    END IF

    role_id ← GetUserRole(userSession)
    IF role_id ≠ 1 THEN
        Redirect to LoginPage
    END IF

    Display "Administrator Accounts" Interface
    Load ActiveAdmins FROM Database USING AJAX

    WHEN "Add Admin" Clicked:
        IF InputValid THEN
            Insert NewAdmin INTO Database
            Refresh Table
        END IF

    WHEN "Edit" Clicked:
        IF InputValid THEN
            Update AdminRecord
            Refresh Table
        END IF

    WHEN "Delete" Clicked:
        Move Admin TO Archives
        Refresh Table

    WHEN "Archives" Clicked:
        Display ArchivedAdmins

    WHEN "Restore" Clicked:
        Restore Admin TO Active
        Refresh Tables

    WHEN UserTypes IN SearchBox:
        Filter Table IN Real-Time

    IF ErrorDetected THEN
        Display ErrorAlert
    END IF
END
Figure 17. Pseudocode for Super Admin Module That Manage
        Admin


Super Admin Module for Tracking Freshmen Submissions 
and Exporting Reports of Approved Documents


This module allows the Super Admin to perform functionality that monitor and track student document submissions. Through this feature, the Super Admin can view and monitor all student document submissions, including those that are still pending and those that have already been approved and export PDF reports. Figure 18 shows the graphical user interface (GUI) of the track document submission page. This page displays a detailed list of student submissions, including the student’s name, submitted requirement, status, remarks, submission date, program, and institute. With this module, the Super Admin can easily monitor the progress of document submissions to ensure that all student requirements are properly tracked and verified.

 
Figure 18. GUI of Track Freshmen Student Submissions and
  Exports Approved Reports  


As shown in Figure 19, the pseudocode explains how the system tracks freshmen student submissions and exports approved reports. The process starts when the Super Admin logs into the system and opens the student document submission page. From there, the Super Admin can view the list of submitted documents, check their status whether pending or approved and monitor the progress of each submission. Once the documents are approved, the Super Admin can export them as PDF files to keep organized records. This helps make tracking and record-keeping faster, easier, and more accurate.

FUNCTIONS: Super Admin That Track Freshmen Document Submissions
BEGIN
    IF userRole ≠ "Super Admin" THEN
        Redirect to LoginPage
    END IF

    Load InstituteList, ProgramList for filtering

    Get FilterInputs:
        lastName, program, institute, dateRange

    Construct SQLQuery to retrieve:
        studentName, requirement, status, submissionDate
    FROM DocumentSubmissions

    APPLY filters (lastName, program, institute, dateRange)

    Display results in DataTable with sorting and pagination

    FOR each submission IN DataTable DO
        IF status = "Pending" THEN
            Show yellow badge
        ELSE IF status = "Rejected" THEN
            Show red badge
        ELSE
            Show green badge
        END IF
    END FOR

    Enable real-time search within submissions

    IF no matching records FOUND THEN
        Display "No Pending or Rejected Submissions Found"
    END IF

    IF invalidFilter OR missingData THEN
        Display Alert("Invalid filter or missing data")
    END IF
END
Figure 19. Pseudocode for Super Admin That Track Freshmen
  Document Submissions


Super Admin Module That Tracks Online Request Transactions


This module allows the Super Admin to perform functions that track online request transactions. It is designed to help manage and monitor student document requests in an organized and efficient way. Through this feature, the Super Admin can easily view all submitted requests, check their current status such as pending and ensure that each transaction is processed properly. The system provides a simple and user-friendly interface, allowing the Super Admin to navigate and manage requests without difficulty. It also helps reduce manual work by automatically recording and updating request details in real time. This ensures that records remain accurate, up-to-date, and well-organized. Overall, this module improves efficiency, saves time, and helps maintain smooth communication between students and the administration. as shown in Figure 20. 

 
Figure 20. GUI of Track Online Requests Transactions


As shown in Figure 21, the pseudocode explains how the system tracks online request transactions. The process starts when the Super Admin logs into the system and opens the track request page. From there, the Super Admin can see all the document requests submitted by students, along with their current status. For example, when a request is reviewed and approved, it changes status in the system right away. This helps the Super Admin monitor all requests more easily and avoid missing any pending transactions. In addition, the system keeps all request details properly recorded, making it simple to review past transactions whenever needed. This process helps ensure that managing online requests is faster, more organized, and less prone to errors.

FUNCTIONS: Super Admin That Track Online Requests
BEGIN
    IF userRole ≠ "Super Admin" THEN
        Redirect to LoginPage
    END IF

    Load InstituteList, ProgramList
    Get FilterInputs (lastName, program, institute, dateRange)

    Retrieve PendingRequests FROM Database
    APPLY Filters TO PendingRequests

    Display FilterSection
    Display DataTable WITH FilteredResults

    FOR each Request IN DataTable DO
        Assign ColorCode BASED ON Status
    END FOR

    Enable RealTimeSearch
    Initialize DataTables FOR Sorting AND Scrolling
END
Figure 21. Pseudocode for Super Admin That Track Online Requests


Super Admin Module that Generates Descriptive Data 
Analytics on Document Type Distributions


This module allows the super admin to perform functions that generate descriptive data analytics on document type distributions. The system organizes the data into a clear visual format, making it easier to track the progress of submissions. By analyzing this data, the Super Admin can quickly see which documents are submitted most often and identify any delays in the submission process. The feature also improves decision-making by providing a clear overview of submission trends, allowing the school to address any issues and improve workflow. This tool makes monitoring submissions faster and more accurate while helping the Super Admin keep everything well-organized, as shown in Figure 22.

 
Figure 22. GUI for Generate Descriptive Data Analytics on
       Document Type Distributions


As shown in Figure 23, the pseudocode explains how the system generates descriptive data analytics on document type distributions. The process starts when the Super Admin logs into the system its display in dashboard. The system then collects data from student document submissions and groups them based on their document types. After gathering the data, the system counts how many of each document type has been submitted and creates a simple summary or chart. This helps the Super Admin easily see which document types are submitted most often and understand the overall submission trends. The analytics feature makes it easier to study, compare, and manage student document records in an organized way.
FUNCTIONS: Super Admin That Generate Descriptive Data Analytics on Document Type Distributions
BEGIN
    Retrieve AllDocumentTypes FROM Database
    Organize Data FOR ChartDisplay

    WHEN FilterClicked:
        Reload Chart WITH FilteredData BY TimePeriod

    Identify DocumentTypes WITH HighestPendingSubmissions
    Determine DocumentTypes WITH HighestApprovalRates
    Highlight DocumentTypes WITH HighRejectionRates
END
Figure 23. Pseudocode for Super Admin That Generate Descriptive
       Data Analytics on Document Type Distributions


Super Admin Module That Generates Descriptive Data
Analytics on Request Distribution


This module allows the Super Admin to perform functions that generate descriptive data analytics on request distributions. It helps the Super Admin see how many requests were made for each document type, such as COR, COG, TOR, and Honorable Dismissal, over a certain period of time. The data is displayed through a bar chart or similar visual tool that shows the percentage and number of each request type. This makes it easier to identify which documents are most frequently requested.

 
Figure 24. GUI for Generate Descriptive Data Analytics on Requests Distributions


As shown in Figure 25, the pseudocode explains how the system generates descriptive data analytics on requests distributions. Once the Super Admin logs into the system, the dashboard immediately displays the analytics summary. The chart gives a quick and clear view of the request trends, helping the Super Admin monitor activities, make better decisions, and keep track of changes over time.

FUNCTIONS: Super Admin That Generate Descriptive Data Analytics on Requests Distributions
BEGIN
    Collect AllDocumentRequests FROM Database
    Organize Data FOR Visualization
    Display AnalyticsChart ON Dashboard

    Enable Filtering BY Date, Program, OR Status
    Calculate KeyMetrics (TotalRequests, Pending, Approved, Rejected)
    Provide ActionableInsights BASED ON DataTrends
END
Figure 25. Pseudocode for Generate Descriptive Data Analytics on
        Requests Distributions


Super Admin Module That Displays Student Submission Status with Checklist per Requirement


This module enables the Super Admin to view and monitor student submission statuses through a checklist format, where each row represents a student and each column corresponds to a required document. It organizes submissions by program and institution, allowing the Super Admin to quickly identify which requirements have been completed or are still pending. By displaying all submission details in a single, structured view, this feature streamlines monitoring, reduces manual tracking, and ensures that incomplete requirements are efficiently identified and addressed.

 
Figure 26. GUI for Displays Student Submission Status with
       Checklist per Requirement


As shown in Figure 27, the pseudocode illustrates how the system generates a checklist-style table displaying each student’s submission status. When the Super Admin logs into the system and accesses the report page, the system retrieves data from submission records, processes it, and presents the results in an organized table. Each row represents a student, with corresponding checkboxes indicating the status of each required document. This allows the Super Admin to easily identify missing submissions by program and institution, facilitating more efficient monitoring, follow-up, and coordination in managing document compliance.

FUNCTIONS: Super Admin That Displays Student submission Status with Checklist per Requirement
BEGIN
    IF userRole ≠ "Super Admin" THEN
        Redirect TO LoginPage
    END IF

    Build SQLQuery TO Retrieve StudentSubmissionData
    Include StudentName, Program, Institute, RequirementStatus

    Execute SQLQuery
    Fetch Results

    FOR EACH StudentRecord IN Results DO
        Display StudentName, Program, Institute
        FOR EACH Requirement IN RequirementList DO
            IF RequirementStatus = "Submitted" THEN
                Display CheckedBox
            ELSE
                Display UncheckedBox
            END IF
        END FOR
    END FOR

    IF NoResultsFound THEN
        Display Message "No student submission data available."
    END IF
END
Figure 27. Pseudocode for Super Admin Module That Displays
        Student Submission Status with Checklist per
        Requirement


Super Admin Module That Generates List of Students with
Pending Requests


This module allows the Super Admin to see and manage a list of students with pending document requests. It helps the Super Admin track which students are still waiting for their requests to be approved or processed. The system shows important details such as the student’s name, requested document type, and request date. This makes it easier for the Super Admin to monitor the progress of each request and make sure no pending request is missed or delayed. It also helps keep the process organized and saves time compared to checking each request manually.

 
Figure 28. GUI for Generate List of Students with Pending Requests


As shown in Figure 29, the pseudocode explains how the system gathers and displays the list of students with pending requests. When the Super Admin logs into the system and opens the pending requests page, the system automatically checks the database for all unapproved or incomplete requests. It then displays the information in a clear table format that is easy to read and understand. This allows the Super Admin to quickly see all pending requests and take action when needed, ensuring faster and more efficient processing.

FUNCTIONS: Super Admin That Generate List of Students with Pending Requests
BEGIN
    IF userRole ≠ "Super Admin" THEN
        Redirect to LoginPage
    END IF

    Execute SQLQuery TO Retrieve PendingRequests
    Fetch Results

    IF Results IS Empty THEN
        Display Message "No Pending Requests – All document requests have been processed" WITH InboxIcon
    ELSE
        FOR each Request IN Results DO
            Display Request IN PendingRequestsTable
        END FOR
    END IF
END
Figure 29. Pseudocode for Generate List of Students with Pending
                  Requests


Admin Module That Manages Freshmen Document Submission Can Verify, Update and Add Optional Remarks or Instructions


This module allows the Admin to manage freshmen document submissions efficiently. It provides tools for verifying, updating, and adding optional remarks or instructions to each student’s submission. The authorized admin can view a list of all submitted documents, check if they are complete and valid, and then update their status to either Approved or Invalid. The option to add remarks helps give clear feedback to students, such as noting missing or unclear documents. This process ensures that all records are properly reviewed and that only verified submissions are accepted, keeping the system organized and reliable.

 
Figure 30. GUI for Manage Freshmen Document Submissions Can
       Verify, Update and Add Optional Remarks Instructions 


As shown in Figure 31, the pseudocode explains how the system processes and manages freshmen document submissions. Once the admin logs into the system and opens the submission page, the system loads the list of students and their uploaded documents. The admin can then select a submission, verify its details, update the status, and add remarks if needed. After saving the changes, the system automatically updates the record in the database. This makes it easier for the Super Admin to track the progress of document verification and maintain accurate and up-to-date student records.

FUNCTIONS:  Admin That Admin that Manage Freshmen
Document Submissions can Verify, Update and Add 
Optional Remarks or Instructions 
BEGIN
    IF userRole ≠ "Admin" THEN
        Redirect to UnauthorizedPage
    END IF

    Display SubmissionsTable WITH Filters

    WHEN "View" Button Clicked FOR Submission DO
        Select Action (Approve OR MarkAsInvalid)

        WHEN "Save Changes" Clicked DO
            IF file_path EXISTS THEN
                IF file IS Image (jpg, jpeg, png, gif) THEN
                    Display ImagePreview
                ELSE IF file IS PDF THEN
                    Display PDFIcon WITH DownloadOption
                ELSE
                    Display GenericFileIcon WITH DownloadOption
                END IF
            ELSE
                Display Message "No file uploaded"
            END IF
        END WHEN
    END WHEN
END
Figure 31. Psuedocode for Admin that Manage Freshmen
        Document Submissions can Verify, Update and Add
        Optional Remarks or Instructions 


Admin Module That Generates Descriptive Data Analytics on Document Type Distributions


This module allows the Admin to generate descriptive data analytics on document type distributions. It helps the admin easily see the number of submitted documents based on their type, such as Birth Certificate, Drug Test Result, Good Moral Certificate, and more. The system groups each document according to its status Pending, Approved, or Rejected and presents the information in a clear bar chart. This makes it easier for the Super Admin to understand submission patterns, monitor the progress of document verification, and identify which documents are often delayed or incomplete.

 
Figure 32. GUI for Generate Descriptive Data Analytics on
    Document   Type Distributions


As shown in Figure 33, the pseudocode explains how the system collects and processes data from student submissions to create the document type distribution chart. Once the Admin logs into the system and shows the analytics dashboard, the system automatically counts and categorizes all submitted documents. The results are displayed visually using color coded bars making it easy to interpret at a glance. This helps the Super Admin analyze trends quickly and make informed decisions to improve the document submission process.

FUNCTIONS: Admin That Generate Descriptive Data Analytics on Document Type Distributions
BEGIN
    Retrieve AllDocumentTypes FROM Database
    Organize Data FOR ChartDisplay

    WHEN FilterClicked DO
        Reload Chart WITH FilteredData BY TimePeriod

    Identify DocumentTypes WITH HighestPendingSubmissions
    Determine DocumentTypes WITH HighestApprovalRates
    Highlight DocumentTypes WITH HighRejectionRates
END
Figure 33. Psuedocode for Admin That Generate Descriptive Data
       Analytics on Document Type Distributions


Admin Module That Generates List of Students with Incomplete Submissions by Program and Institute


This module allows the Admin to generate a list of students with incomplete document submissions, organized by program and institute. It helps the Admin easily see which students still need to submit certain documents. The system automatically checks the database and identifies missing requirements for each student. It then groups the data based on the student’s program and institute, making it easier to monitor and follow up. This feature saves time and ensures that all student records are properly checked and updated before final approval.

 
Figure 34. GUI for Generate List of Students with Incomplete
 Submission by Program and Institute


As shown in Figure 35, the pseudocode explains how the system gathers and displays the list of students with incomplete submissions by program and institute. When the Admin logs into the system , it’s display student records to find those with missing documents. It then displays the results in a simple table showing the student’s name, program, institute, and the specific documents they still need to submit. This makes it easier for the Admin to track progress, remind students of their pending requirements, and keep the submission process organized.

FUNCTIONS: Admin That Generate List of Students with Incomplete Submission by Program and Institute
BEGIN
    IF userRole ≠ "Admin" THEN
        Redirect to LoginPage
    END IF

    Build SQLQuery TO Identify IncompleteStudents
    Calculate MissingRequirementsCount

    IF FiltersSpecified THEN
        Apply Filters TO SQLQuery
    END IF

    Execute SQLQuery
    Fetch Results

    Display Results IN "Incomplete Submissions" Tab

    IF NoResultsFound THEN
        Display Message "No incomplete submissions found"
    END IF
END
Figure 35. Psuedocode for Generate List of Students with
        Incomplete Submission by Program and Institute


Admin Module That Manages Document Requests Can Update Requests Status


This module allows the Admin to manage and monitor student document requests easily. It displays the current status of each request, such as pending, so the Admin can quickly see which ones still need attention. After reviewing the submitted details, the Admin can either  approved or reject the request. This feature helps organize all requests in one system, making the process faster and reducing errors or delays in handling student documents.

 
Figure 36. GUI for Admin Module That Manage Document
        Requests Can Update Requests Status


As shown in Figure 37, the pseudocode explains how the system updates and manages document request statuses. When the Admin logs into the system and opens the request management page, all pending requests are shown by default. The Admin can select a specific request, review the attached details or documents, and decide whether to approve or reject it. Once the action is saved, the system automatically updates the request’s status and refreshes the list. This allows the Admin to efficiently track progress and maintain accurate and up-to-date records.

FUNCTIONS: Admin That Manage Document Requests Can Update Requests Status
BEGIN
    IF userRole ≠ "Request Admin" THEN
        Redirect to LoginPage
    END IF

    Get FilterInputs (lastName, program)
    Execute SQLQuery TO Retrieve PendingRequests BASED ON Filters
    Display PendingRequestsTable WITH ActionButtons

    WHEN ActionButton Clicked (Approve OR Reject) DO
        Display ConfirmationMessage "Are you sure?"
        
        IF Confirmed THEN
            Update RequestStatus IN Database

            IF UpdateSuccessful THEN
                Display SuccessMessage
                Remove UpdatedRecord FROM PendingRequestsTable
            ELSE
                Display ErrorMessage "Update unsuccessful"
            END IF
        END IF
    END WHEN
END
Figure 37. Psuedocode for Admin Module That Manage Document
        Requests Can Update Requests Status


Admin Module That Assigns Release Date for Approved Documents and Notify Student via email and SMS


This module allows the Admin to set a release date for approved student documents and automatically notify students through email and SMS. Once a request is approved, the Admin can assign the date when the document will be ready for claiming. This helps both the Admin and the students stay informed and organized. The system makes sure students receive timely updates about their document release, reducing confusion and unnecessary follow-ups. It also helps the Admin manage document distribution smoothly and avoid scheduling conflicts.

 
Figure 38. GUI for Admin Module That Assign Release Date for
       Approved Documents and Notify student via Email and
       SMS


As shown in Figure 39, the pseudocode explains how the system assigns release dates and sends notifications to students. When the Admin logs into the system and opens the approved requests page, they can select a document and set its release date. After saving, the system automatically updates the database and triggers an email and SMS message to the student. The notification includes the release date and instructions for claiming the document. This process ensures clear communication, faster coordination, and better service for students.

FUNCTIONS: Admin Module That Assign Release Date for Approved Documents and Notify student via email and SMS
BEGIN
    IF userRole ≠ "Request Admin" THEN
        Redirect to LoginPage
    END IF

    Ensure tbl_document_requests HAS Columns (is_notified, notification_date)

    Retrieve ApprovedRequests WHERE is_notified = 0
    Display RequestsTable WITH Pagination AND Search

    WHEN "Update & Notify" Button Clicked DO
        Open ModalForm TO Set ReleaseDate (Default = Today + 3 days)
        IF AdminConfirms THEN
            Send RequestID, Status, ReleaseDate TO Server VIA AJAX
            Update RequestRecord SET is_notified = 1 AND ReleaseDate
            Send Email AND SMS Notification TO Student

            IF UpdateSuccessful THEN
                Display SuccessMessage
            ELSE
                Display ErrorMessage
            END IF
        END IF
    END WHEN
END
Figure 39. Psuedocode for Admin Module That Assign Release Date
        for Approved Documents and Notify student via Email
        and SMS


Admin Module That Can View Request History


This module allows the Admin to view the history of student document requests. It provides a clear record of all past transactions, including the date of request, document type, status, and actions taken by the Admin. This helps the Admin keep track of processed requests and verify previous activities when needed. Having access to request history also makes it easier to handle follow-ups, confirm completed transactions, and maintain accurate records for reporting or reference.

 
Figure 40. GUI for Admin Module That View Request History


As shown in Figure 41, the pseudocode explains how the system retrieves and displays the request history. When the Admin logs into the system and opens the request history page, the system automatically loads all past request data from the database. It then organizes the information in a simple table or list format. This makes it easy to review past requests quickly and ensure transparency and accuracy in all document transactions.

FUNCTIONS: Admin That View Request History
BEGIN
    IF userRole ≠ "Request Admin" THEN
        Redirect to LoginPage
    END IF

    Ensure tbl_document_requests HAS Column notification_date

    Retrieve ClaimedDocuments FROM Database
    Display ClaimedDocuments IN RequestHistoryTable

    IF ErrorOccurs THEN
        Display ErrorAlert
    END IF
END
Figure 41. Pseudocode for Admin Module That Can View Request
        History


Admin Module That Generates Descriptive Data Analytics on Request Distribution


This module allows the Admin to generate simple data analytics about request distribution. It helps the Admin see how many requests were made for each type of document, such as COR, COG, TOR, or Honorable Dismissal. The system gathers all the data and shows it in a visual form, like a bar chart or graph. This makes it easier for the Admin to understand which documents are requested most often and track trends over time. The feature helps improve planning and decision-making by giving a clear view of how requests are spread across different document types.
 
Figure 42. GUI for Admin Module That Generate Descriptive Data
        Analytics on Request Distribution 

As shown in Figure 43, the pseudocode explains how the system collects and processes data to show request distribution. Once the Admin logs into the system and accesses the analytics page, the system automatically gathers all document request records and organizes them by type. The data is then presented in a clear and simple chart that displays the total number or percentage of each request category. This allows the Admin to easily view, compare, and understand which document types are most frequently requested. Overall, the process helps simplify data analysis and supports better management of student requests.


FUNCTIONS: Admin That Generate Descriptive Data Analytics on 
Request Distribution
BEGIN
    Collect AllDocumentRequests FROM Database
    Organize Data FOR Visualization
    Display AnalyticsChart ON Dashboard

    Enable Filtering BY Date, Program, OR Status
    Calculate KeyMetrics (TotalRequests, Pending, Approved, Rejected)
    Provide ActionableInsights BASED ON DataTrends
END
Figure 43. Pseudocode for Admin Module That Generates
        Descriptive Data Analytics on Request Distribution


Admin Module That Generates List of Students with Pending
Requests

This module allows the Admin to see all students who still have requests waiting to be processed. It gives the Admin a clear view of which requests have not been completed, making it easier to manage and follow up on them. The module shows important information like the student’s name, the type of request, the date it was submitted, and the current status. This helps the Admin quickly identify students who need reminders.
 
Figure 44. GUI for Admin Module That Generates List of Students
        with Pending Requests


As shown in Figure 45, the pseudocode explains how the system collects and organizes the information. When the Admin opens this module, the system automatically checks all submitted requests, finds the ones that are still pending. This process saves time, reduces mistakes, and allows the Admin to focus on processing requests efficiently. By using this module, the Admin can manage student requests in a more organized and effective way.

FUNCTIONS: Admin That Generate List of Students with Pending Requests
BEGIN
    IF userRole ≠ "Admin" THEN
        Redirect to LoginPage
    END IF

    Execute SQLQuery TO Retrieve PendingRequests
    Fetch Results

    IF Results IS Empty THEN
        Display Message "No Pending Requests – All document requests have been processed" WITH InboxIcon
    ELSE
        FOR each Request IN Results DO
            Display Request IN PendingRequestsTable
        END FOR
    END IF
END
Figure 45. Psuedocode for Admin Module That Generate List of
Students with Pending Requests


Evaluation Ratings of Respondents in Terms of Functional Suitability Based on the ISO 25010 Software Quality Framework


Through the descriptive ratings gathered from respondents, this study evaluates the functional suitability of the RegisTrack System to determine how effectively its features meet user requirements. The assessment aims to identify the system’s strengths, weaknesses, and potential areas for enhancement to ensure that it performs its intended functions efficiently. The results provide valuable insights into the system’s capability to support tasks such as document tracking, submission verification, and request management across various modules. Evaluating these ratings offers a user-centered approach that emphasizes functionality and responsiveness to user needs. The respondents’ evaluations of functional suitability are presented in Tables 6 and 7, which include the assessment descriptions, mean values, and verbal interpretations.

Table 6.	Evaluation Ratings from the Respondents Super Admin and Advisory Committee in Terms of the Functional Suitability of the System
Assessment Description	Mean	Verbal Interpretation
The Super Admin account efficiently manages 
   administrator accounts and their privileges.	4	Agree
The Super Admin accurately tracks freshmen
   document submissions.	4	Agree
The Super Admin efficiently generates
   approved submissions.	4	Agree
The Super Admin accurately tracks online
   request transactions.      	5	Strongly Agree
The Super Admin effectively generates
   descriptive data analytics for document type
   distribution.	4	Agree
The Super Admin effectively generates
   descriptive data analytics for request
   distribution.    	4	Agree
The Super Admin accurately generates a list of
   students with incomplete submissions by
   program and institution.	3.75	Agree


The Super Admin efficiently generates a list of
   students with pending requests.          	3.75	Agree
OVERALL MEAN	4.06	Agree


Table 6 shows that respondents generally agreed with the functional suitability of the system, as reflected in the overall mean of 4.06 (Agree). This indicates that the system is performing its intended functions effectively based on the evaluation of the Super Admin and Advisory Committee.
The highest-rated indicator is the system’s ability to accurately track online request transactions with a mean score of 5.00 (Strongly Agree). This suggests strong user confidence in this feature, likely because it provides accurate, real-time monitoring—an important aspect of efficient administrative processing.
On the other hand, the lowest-rated indicators are the features for generating lists of students with incomplete submissions and pending requests, each with a mean of 3.75 (Agree). Although still positively rated, these lower scores imply that these functions may require refinement, such as improving data accuracy, enhancing filter functions, or optimizing the report-generation process.
Overall, the results demonstrate that the system performs well in supporting administrative tasks and aligns with the ISO/IEC 25010:2011 framework, which states that functional suitability refers to the degree to which a system provides functions that meet stated and implied needs. As explained by ISO (2021) and ISO25000.com, systems that score well in this quality characteristic offer reliable, accurate, and appropriate functionality—consistent with how respondents evaluated the system’s performance.

Table 7.	Evaluation Ratings of Respondents Admission Office in Terms of the Functional Suitability of the System
Assessment Description	Mean	Verbal Interpretation
The Admission Admin accurately verifies
   student documents.   	4	Agree
The Admission Admin efficiently updates	4	Agree
Continuation from Table 7
   document status.		
The Admission Admin accurately adds optional
   remarks or instructions.  	4.5	Agree
The Admission Admin effectively generates
   descriptive data analytics for document type
   distribution.	4.5	Agree
The Admission Admin accurately generates a
   list of students with incomplete submissions
   by program and institute.	5	Strongly Agree
OVERALL MEAN	4.40	Agree


Table 7 shows that the respondents from the Admission Office generally agreed with the functional suitability of the system, as reflected in the overall mean of 4.40 (Agree). This indicates that the system effectively supports the core tasks required in the admission verification process.
The highest-rated indicator is the system’s ability to accurately generate a list of students with incomplete submissions by program and institute, which received a mean score of 5.00 (Strongly Agree). This demonstrates strong confidence in the system’s capability to produce accurate and organized reports, which are essential for monitoring student compliance during admission.
Meanwhile, the lowest-rated indicators are the features related to verifying student documents and updating document status, each with a mean of 4.00 (Agree). Although still positively rated, these features may benefit from minor enhancements—possibly in terms of interface usability, processing speed, or workflow clarity—to further improve efficiency during document validation.
Other indicators, such as adding optional remarks and generating descriptive data analytics (each with means of 4.50), were rated higher, indicating that users find these functionalities helpful and accurate for supporting decision-making.
Overall, the results confirm that the system meets its functional requirements for admission workflows, aligning with the ISO/IEC 25010:2011 framework. According to ISO’s definition, functional suitability refers to how well system functions meet stated needs, emphasizing accuracy, completeness, and appropriateness. The system’s high scores reflect these principles, consistent with ISO/IEC 25010 and the detailed explanation on ISO25000.com.

Table 8.	Evaluation Ratings of Respondents Registrar’s Office in Terms of the Functional Suitability of the System
Assessment Description	Mean	Verbal Interpretation
The Registrar Admin efficiently updates the
   status of student requests.	4.33	Agree
The Registrar Admin accurately assigns release
   dates for approved documents.   	4	Agree
The Registrar Admin effectively notifies
   students via email and SMS.	4.67	Strongly Agree
Continuation from Table 8
The Registrar Admin accurately views request
   history.	4.67	Strongly Agree
The Registrar Admin effectively generates
   descriptive data analytics for request
   distribution.	4.17	Agree
The Registrar Admin accurately generates a list
   of students with pending requests.	4.33	Agree
OVERALL MEAN	4.36	Agree

Table 8 shows that respondents from the Registrar’s Office agreed with the system’s functional suitability, as indicated by the overall mean of 4.36 (Agree). This reflects that the system is performing effectively in supporting key registrar operations, particularly in handling student request transactions.
The highest-rated indicators are the system’s ability to effectively notify students via email and SMS and to accurately view request history, both receiving a mean score of 4.67 (Strongly Agree). These results indicate that users find these features highly reliable, especially since timely notifications and accessible request histories are crucial for streamlined communication and efficient processing of student requests.
The lowest-rated indicator is the system’s ability to accurately assign release dates for approved documents, with a mean of 4.00 (Agree). Although still positively evaluated, this score suggests that the feature may benefit from improvements, such as enhanced date-setting options or clearer scheduling workflows to ensure smoother release management.
Other functions—such as updating request status, generating request distribution analytics, and producing lists of students with pending requests—received mean scores ranging from 4.17 to 4.33, indicating that these features operate effectively and consistently meet user expectations.
Overall, the evaluation confirms that the system aligns with the ISO/IEC 25010:2011 quality model for functional suitability, which emphasizes accuracy, appropriateness, and the completeness of system functions. According to ISO and ISO25000.com, systems that score well in functional suitability provide dependable functionality that supports organizational processes—consistent with how the Registrar’s Office rated the system.

Summary of Respondents’ Rating Based on ISO 25010
Software Quality Framework


The RegisTrack System was evaluated using the ISO 25010 Software Quality Framework to determine its effectiveness in meeting user requirements and ensuring system quality. The assessment covered five quality characteristics—Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility—to measure how well the system performs in real-world use.
Table 9 presents the summarized ratings of respondents, reflecting positive feedback across all categories. Users particularly appreciated the system’s usability, efficiency, and reliability in handling registrar and admission processes. This evaluation serves as a basis for continuous improvement, helping developers identify areas for enhancement to make the RegisTrack System even more user-friendly, efficient, and responsive to institutional needs.

Table 9.	Summary of Respondents’ Rating Based on ISO 25010 Software Quality Framework
Assessment Description	Mean	Verbal Interpretation
Functional Suitability	4.11	Agree
Performance Efficiency	4.19	Agree
Usability	4.42	Agree
Reliability   	4.22	Agree
Compatibility  	4.19	Agree
OVERALL MEAN	4.22	Agree


Table 9 shows that the respondents generally agreed with the system’s quality based on the ISO 25010 Software Quality Framework, as reflected in the overall mean of 4.22 (Agree). This indicates that the system meets the expected standards for software quality across all evaluated characteristics.
The highest-rated quality attribute is Usability, with a mean score of 4.42 (Agree). This suggests that users found the system easy to navigate, intuitive, and supportive of efficiency in task completion—key indicators of a user-centered design.
The lowest-rated attribute is Functional Suitability, with a mean of 4.11 (Agree). Although still positively rated, this slightly lower value signals that certain system functions may require refinement to further enhance completeness, accuracy, or appropriateness of features.
Other attributes—including Performance Efficiency (4.19), Reliability (4.22), and Compatibility (4.19)—also received strong “Agree” ratings. These scores demonstrate that the system performs well under expected workloads, operates dependably, and integrates effectively within the technological environment used by DSSC administrative units.
Overall, the results affirm that the system aligns with the ISO/IEC 25010:2011 quality model, which highlights usability, reliability, performance, and functional suitability as essential dimensions of software quality. According to ISO and ISO25000.com, meeting these attributes indicates that the system is capable of supporting organizational processes effectively, reliably, and efficiently.
 
CHAPTER V


SUMMARY, CONCLUSION, RECOMMENDATION


This chapter provides an overview of the study’s major findings, conclusions derived from the evaluation results, and recommendations for future development. The summary emphasizes the key insights obtained from assessing the system using the ISO 25010 Software Quality Framework. The conclusions interpret these findings in relation to the study’s objectives, while the recommendations outline potential improvements and future directions to further enhance the system’s functionality and effectiveness.

Summary


The primary goal of this project was to develop “RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students with Data Analytics,” designed to automate and streamline document submission, verification, and request tracking processes in the registrar’s office. The system was evaluated based on the ISO 25010 Software Quality Framework, focusing on Functional Suitability, Performance Efficiency, Usability, Reliability, and Compatibility. Feedback from freshmen students, registrar staff, and evaluation committee members served as the basis for the system’s performance assessment.
The Advisory Module achieved an overall mean of 4.08 (Agree), indicating dependable and user-friendly functionality in managing advisory-related processes. The Super Admin Module received an overall mean of 4.03 (Agree), with the highest rating in usability (4.67), showing that users found it highly intuitive and efficient. The Admission Module obtained the highest overall mean of 4.61 (Strongly Agree), reflecting excellent performance efficiency and functional suitability in processing student admission documents. Meanwhile, the Registrar Module earned an overall mean of 4.18 (Agree), highlighting strong compatibility and usability across different devices and browsers.
In summary, the RegisTrack system achieved favorable user evaluations across all modules, demonstrating its effectiveness, reliability, and ease of use in supporting registrar operations. These findings confirm that the developed system successfully meets user expectations and provides a practical solution for improving document management efficiency within the registrar’s office. However, continuous refinement is recommended to further enhance its performance and user experience.

Conclusion


As a result of the research, the following conclusions were drawn:
	The Super Admin module efficiently manages administrator accounts and their assigned privileges. It received a consolidated mean of 4, indicating that users found this feature effective, reliable, and helpful in overseeing system access.
	The Super Admin module accurately tracks freshmen document submissions. It also received a consolidated mean of 4, showing that respondents agreed the feature works well and supports accurate monitoring of requirements.
	The Super Admin efficiently generates approved submissions, receiving a consolidated mean of 4, which reflects that users found the feature useful and easy to use.
	The Super Admin accurately tracks online request transactions and received the highest rating with a consolidated mean of 5, demonstrating very strong user satisfaction and confirming that the feature is highly effective.
	The Super Admin effectively generates descriptive data analytics for document type distribution. It received a consolidated mean of 4, showing that users find the analytics feature informative and functional.
	The Super Admin effectively generates descriptive data analytics for request distribution, also receiving a consolidated mean of 4, indicating that the feature is helpful for monitoring request patterns.
	The Super Admin accurately generates a list of students with incomplete submissions by program and institution. It obtained a consolidated mean of 3.75, suggesting that the feature is functional but may benefit from further enhancement.
	The Super Admin efficiently generates a list of students with pending requests, also receiving a consolidated mean of 3.75, showing that users find the feature beneficial, though improvement may further enhance satisfaction.
	The Admission Admin accurately verifies student documents and received a consolidated mean of 4, indicating users find this feature effective and reliable.
	The Admission Admin efficiently updates document status, also receiving a consolidated mean of 4, showing that the feature is easy to use and helpful in streamlining the verification process.
	The Admission Admin accurately adds optional remarks or instructions and received a consolidated mean of 4.5, demonstrating that users find the feature practical and supportive in facilitating communication.
	The Admission Admin effectively generates descriptive data analytics for document type distribution. This feature received a consolidated mean of 4.5, showing that respondents find the analytics clear, useful, and accurate.
	The Admission Admin accurately generates a list of students with incomplete submissions by program and institute and received a consolidated mean of 5, indicating strong user approval and confirming the feature’s high reliability.
	The Registrar Admin efficiently updates the status of student requests, receiving a consolidated mean of 4.33, which shows that users find the feature effective and essential for record tracking.
	The Registrar Admin accurately assigns release dates for approved documents. It received a consolidated mean of 4, indicating the feature is reliable and helpful in scheduling document release.
	The Registrar Admin effectively notifies students via email and SMS. This feature received a consolidated mean of 4.67, demonstrating that users strongly agree on its efficiency and importance in communication.
	The Registrar Admin accurately views request history, also receiving a consolidated mean of 4.67, showing that users find this function very accurate, useful, and easy to navigate.
	The Registrar Admin effectively generates descriptive data analytics for request distribution, with a consolidated mean of 4.17, indicating users find the analytics feature informative and functional.
	The Registrar Admin accurately generates a list of students with pending requests and received a consolidated mean of 4.33, showing that users find the feature beneficial and dependable.
In light of the conclusions above, the system demonstrates strong functional suitability across all administrative levels. The Super Admin, Admission Admin, and Registrar Admin modules were all rated positively, with several features achieving very high satisfaction scores, such as tracking online request transactions (5.0), generating lists of incomplete submissions (5.0), and sending notifications (4.67). These results show that the system performs efficiently, reliably, and accurately in supporting institutional processes.
Overall, the system successfully met its objectives by providing a dependable, user-friendly, and effective platform for managing student records, document submissions, and academic transactions.

Recommendations


Based on the conducted assessment, several recommendations are proposed to further enhance the developed RegisTrack: A Web-Based Document Submission and Verification System for Freshmen Students. These recommendations are:
	Implement real-time analytics dashboards with visual indicators (charts, graphs, color-coded alerts) to provide administrators with instant insights into document submission trends, pending requests, and overall system activity.
	Integrate automated reminders and notifications for students regarding upcoming submission deadlines, missing documents, or pending requests, delivered via email or SMS to reduce delays and improve compliance.

Overall, the recommended enhancements, such as implementing real-time analytics dashboards with visual indicators and integrating automated reminders and notifications via email or SMS, aim to improve the efficiency, responsiveness, and usability of the system. These features are expected to provide administrators with immediate insights into submission trends and pending requests while keeping students informed about deadlines and requirements, thereby enhancing compliance, reducing delays, and supporting more effective management of document submissions.
 
REFERENCES


Alade, S. M. (2023). Design and implementation of a web-based document      management system. International Journal of Information Technology and Computer Science, 15(2), 35-53. https://doi.org/10.5815/ijitcs.2023.02.04

Ali, R. N., Abdullayev, V. H., & Abbasova, V. S. (2020). Analysis of main requirements for electronic document management systems. ScienceRise, (1), 28-31.  https://doi.org/10.21303/sr.v0i1.1148

Alomary, F. O. (2020). Evaluation of scientific research based on key performance indicators (KPIs): A case study in Al-Imam Mohammad Ibn Saud Islamic University. Computer and Information Science, 13(1), 34-40. https://www.ccsenet.org/journal/index.php/cis/article/view/0/41778

Ang, K. L.-M., Ge, F. L., & Seng, K. P. (2020). Big educational data & analytics: Survey, architecture and challenges. IEEE Access, 8, 116392-116414. https://doi.org/10.1109/ACCESS.2020.2994561

Aryaman, M., Sharma, R. K., & Jain, S. (2024). Interactive dashboard for student analysis [Undergraduate Thesis, Jaypee University of Information Technology]. Jaypee University of Information Technology Digital Library. http://www.ir.juit.ac.in:8080/jspui/bitstream/123456789/11473/1/Interactive%20Dashboard%20for%20Student%20Analysis.pdf
		

Asamoah, D. (2022). Improving data visualization skills: A curriculum design. International Journal of Education and Development Using Information and Communication Technology, 18(1), 213-235. https://eric.ed.gov/?id=EJ1345404 

Batool, S., Rashid, J., Nisar, M. W., Kim, J., Kwon, H.-Y., & Hussain, A. (2022). Educational data mining to predict students' academic performance: A survey study. Education and Information Technologies, 28, 905-971. https://doi.org/10.1007/s10639-022-11152-y 

Chang, H.-Y., Chang, Y.-J., & Tsai, M.-J. (2024). Strategies and difficulties during students’ construction of data visualizations. International Journal of STEM Education, 11, Article 11. https://doi.org/10.1186/s40594-024-00463-w

Cheppala, S. (2024). Behavior-based incentivization and predictive analytics: A machine learning approach to encouraging positive outcomes. International Journal of Research Publication and Reviews, 5(11), 582-590. https://ijrpr.com/uploads/V5ISSUE11/IJRPR34678.pdf 

De Miguel González, R., Mar-Beguería, J., Sebastián López, M., & Kratochvíl, O. (2025). GIS-based dashboards as advanced geospatial applications for climate change education and teaching the future. ISPRS International Journal of Geo-Information, 14(2), Article 89. https://doi.org/10.3390/ijgi14020089

Divya, S. R., Keerthana, G., Krisshneshri, M., & Vasantha, K. V. (2022). Digital documents verification system. In 2022 1st International Conference on Computer, Power and Communications (ICCPC) (pp. 389-392). IEEE Explore. https://doi.org/10.1109/iccpc55978.2022.10072252

Falolo, V. M., Capillas, K. T., Vergarra, N. A., & Cerbito, A. F. (2022). Student registration and records management services towards digitization. International Journal of Educational Management and Development Studies, 3(1), 149-165. https://doi.org/10.53378/352867

Ganesan, P., Jagatheesaperumal, S. K., Gobhinath, I., Venkatraman, V., Gaftandzhieva, S., & Doneva, R. Z. (2024). Deep learning-based interactive dashboard for enhancing online classroom experience through student emotion analysis. IEEE Access, 12, 91140-91153. https://doi.org/10.1109/ACCESS.2024.3421282 

Hermosa, K. R., Loteriña, V. C. B., & Sebuc, J. A. (2023). Document management system with tracking and monitoring in Manuel S. Enverga University Foundation-Candelaria Inc.  International Journal of Advanced Research in Computer Science, 14(6), 31-43. https://doi.org/10.26483/ijarcs.v14i6.7038

KanayoKizito, U., & Nwabueze, E. E. (2019). Web based students’ record management system for tertiary institutions. International Journal of Advanced Research in Science Engineering and Technology, 6(6), 9624-9631. http://www.ijarset.com/upload/2019/june/20-IJARSET-Kizzyict-14.pdf

Kiaghadi, M., & Hoseinpour, P. (2023). University admission process: A prescriptive analytics approach. Artificial Intelligence Review, 56, 233-256. https://doi.org/10.1007/s10462-022-10171-y

Manly, C. A. (2024). Connecting prescriptive analytics with student success: Evaluating institutional promise and planning. Education Sciences, 14(4), Article 413. https://doi.org/10.3390/educsci14040413

Mengash, H. A. (2020). Using data mining techniques to predict student performance to support decision making in university admission systems. IEEE Access, 8, 55462-55470. https://ieeexplore.ieee.org/abstract/document/9042216

Midway, S. R. (2020). Principles of effective data visualization. Patterns, 1(9), 1-7. https://doi.org/10.1016/j.patter.2020.100141

Mondal, S. R. (2025). Automating KPI measurement: A sustainable solution for educational accreditation. Sustainability, 17(5), Article 1968. https://doi.org/10.3390/su17051968

Mphunda, J., & Mnjama, N. (2022). Application of ARMA information governance maturity model for assessment of records management programme at Chancellor College, University of Malawi. Journal of the South African Society of Archivists, 55, 88-109. https://www.ajol.info/index.php/jsasa/article/view/235747

Parivara, S. A., & Saxena, S. (2025). Leveraging data analytics for enhanced academic outcomes: Strategies and applications. In F. D. Mobo (Ed.), Impacts of AI on students and teachers in education 5.0 (pp. 343-575). IGI Global Publishing. https://books.google.com.ph/books?hl=en&lr=&id=su1CEQAAQBAJ&oi=fnd&pg=PA349&dq=student+records+with+data+analytics&ots=rQ4IjNnMEo&sig=-kzo2kj6CuCWWwjDUW4ioucyYMQ&redir_esc=y#v=onepage&q=student%20records%20with%20data%20analytics&f=false

Rahman, N. H. A., Sulaiman, S. A., & Ramli, N. A. (2024). Development of predictive model for students’ final grades using machine learning techniques. In 3rd International Conference on Applied & Industrial Mathematics and Statistics 2022 (ICoAIMS2022) (2895, Article 060003. https://doi.org/10.1063/5.0193320

Ramaswami, G., Susnjak, T., & Mathrani, A. (2022). Supporting students’ academic performance using explainable machine learning with automated prescriptive analytics. Big Data and Cognitive Computing, 6(4), Article 105. https://doi.org/10.3390/bdcc6040105

Reyes, J. R. M. U., & Origines, D. V. Jr. (2024). Data analytics on web-based document notification system. In 5th International Conference on Science Health and Technology (ICOHETECH) (pp. 1-11). LPPM Duta Bangsa University Surakarta.  https://doi.org/10.47701/icohetech.v5i1.4108

Reyes, J. R. M. U., & Origines, D. V., Jr. (2024b). Smart office document management syste m with descriptive analytics and SMS alerts. In 5th International Conference on Science Health and Technology (ICOHETECH) (pp. 63-74). LPPM Duta Bangsa University Surakarta.  https://doi.org/10.47701/icohetech.v5i1.4130

Samson, A. A. C., Abarquez, J. K. S. L., Llave, J. N. J., Sing, J. a. P., & Estrella, N. E. (2025). Beyond the arch: A web and mobile alumni record verification system for the University of Santo Tomas office of the registrar. In International Conference on Green Energy, Computing and Intelligent Technology 2024 (Gen-CITy 2024) (pp. 56-65). Institution of Engineering and Technology. https://doi.org/10.1049/icp.2025.0234
		

Shafiq, D. A., Marjani, M., Habeeb, R. A. A., & Asirvatham, D. (2022). Student retention using educational data mining and predictive analytics: A systematic literature review. IEEE Access, 10, 72480-72503. https://doi.org/10.1109/ACCESS.2022.3188767

Staneviciene, E., Gudoniene, D., Punys, V., & Kukstys, A. (2024). The case study on data mining based students’ performance prediction for academic success in e-learning. Preprints. https://doi.org/10.20944/preprints202410.1635.v1

Susnjak, T., Ramaswami, G. S., & Mathrani, A. (2022). Learning analytics dashboard: A tool for providing actionable insights to learners. International Journal of Educational Technology in Higher Education, 19(1), Article 12. https://doi.org/10.1186/s41239-021-00313-7

Tangkudung, R. R. S., Wartabone, I. N., Saraisang, C. M., Komalig, F. R. M., Radjak, A. A., & Injili, L. K. (2024). Online management system for universities based on a website. Journal Syntax Admiration, 5(11), 5197-5204. https://doi.org/10.46799/jsa.v5i11.1854

Theobald, R., & Evans, A. M. (2025). Developing democratic citizens through geography. In S. W. Bednarz & J. T. Mitchell (Eds.), Handbook of geography education (pp. 81-108). Springer. https://doi.org/10.1007/978-3-031-72366-7_5

Touray, R. (2021). A review of records management in organisations. Open Access Library Journal, 8, Article e08107. https://www.oalib.com/articles/6765178

Triyana, M. H., & Fianty, M. I. (2023). Optimizing educational institutions: Web-based document management. International Journal of Science Technology & Management, 4(6), 1653-1659. https://doi.org/10.46729/ijstm.v4i6.976

Wu, D. T. Y., Vennemeyer, S., Brown, K., Revalee, J., Murdock, P., Salomone, S., France, A., Clarke-Myers, K., & Hanke, S. P. (2019). Usability testing of an interactive dashboard for surgical quality improvement in a large congenital heart center. Applied Clinical Informatics, 10(5), 859-869.
https://doi.org/10.1055/s-0039-1698466
















 







































Appendix 1. Filled-up Survey Questionnaire

 
 
Continuation…

  
Continuation…

  
Appendix 2. Raw/Tabulated Data

 

 

 

 
 
Appendix 3. Acceptance Form

 
 
Continuation… 

 
 
Continuation… 

 
 
Continuation… 

 
 
Continuation… 

  
Appendix 4. User’s Manual


Super Admin Module	
 	Upon successful login, the user will be directed to the main interface featuring a sidebar menu. The sidebar provides easy navigation to various sections of the system, including Dashboard, Admin Accounts, Track Submissions, Track Requests, and My Profile. Each section serves a specific purpose to help users manage and monitor different system functions efficiently.

When you click “Manage Accounts”, you will have the option to add new admins for either Submission or Request management.

There are two types of admins in the system:

	Submission Admin – Responsible for tracking and managing freshmen students submitted documents and requirements.
	Request Admin – Handles and monitors student document requests, including the type and status of each request.







	Under the “Track Submissions” section in the sidebar, there are two subsections: “Pending Submissions” and “Approved Submissions.”

As a Super Admin, you can view the list of students by selecting either subsection. The Pending Submissions section displays students whose document submissions are still awaiting approval, while the Approved Submissions section shows those that have been successfully verified and approved.

Additionally, you have the option to export PDF reports of all approved submissions for record-keeping and documentation purposes.









 
Appendix 5. Relevant Source Code


Source code for the Super Admin functionality that allows adding new admin accounts.

 

Source code for the Super Admin functionality that track freshmen document submissions.

  
Appendix 6. Nomination Form (Outline)

 
 
Appendix 7. Application for Outline Defense

 
 
Appendix 8. Capstone Outline Processing Form

 
 
Appendix 9. Permit to Conduct 

 
 
Appendix 10. Photo Documentation


   



 
Curriculum Vitae

 

PERSONAL DATA

Date of Birth:		September 18, 2003
Place of Birth:	City of Manila
Sex:			Female
Height:		4’11”
Weight:		44 kg
Status:		Single
Religion:		Roman Catholic
Nationality:		Filipino
Tribe:			N/A
Parents:
Father:		Eugenio Rillo
Mother:		Guillerma Rillo

EDUCATIONAL BACKGROUND

Elementary:		Pasig Elementary School 2008-2015
Honors

Junior High School:	Cogon Bacaca High School of Kiblawan Inc.
2015-2019
With Honors

Senior High School:	Gov. Nonito D. Llanos Sr. National High School
2019-2022
With Honors

College:		Davao Del Sur State College 2022 - present
Currently IV-BSIT       
CURRICULUM VITAE


Arbeah A. Sayadi
09266876245
arbeahsayadi@gmail.com
Purok Maligaya B, Bato, Sta Cruz, Davao del Sur
________________________________________

PERSONAL DATA

    Date of Birth: 	February 19, 2003
    Place of Birth:	Bato, Sta. Cruz, Davao del Sur
    Sex:		Female
    Height:		158 cm
    Weight:		52 kg
    Status:		Single
    Religion:		Islam
    Nationality:	Filipino
    Tribe:		Tausug
    Parents:
	Father:	Rashid Sayadi
	Mother:	Charlyn Sayadi

Educational Background

Elementary:		   Apolinar Franco Sr. Elementary School 
   (2009-2015)

Junior High School:	   Bato National High School 
   (2015-2019)
   With Honors

Senior High School:	   Bato National High School 
   (2019-2021)

College:  		   Davao Del Sur State College 
 			   (2021 – present)
			   Currently IV-BSIT      
