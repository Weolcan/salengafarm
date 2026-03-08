
eRehistroPH: CIVIL REGISTRY MANAGEMENT SYSTEM BASED ON ARTA WITH DATA ANALYTICS








SANDARA LARIEGO SIATOCA
ALISER JAY CATUNAO VALDERAMA









CAPSTONE PROJECT OUTLINE SUBMITTED TO THE FACULTY OF
THE   COLLEGE   OF   COMPUTING,   ENGINEERING   AND
TECHNOLOGY  DAVAO DEL  SUR  STATE  COLLEGE, 
MATTI,  DIGOS CITY.  IN PARTIAL 
FULFILLMENT   OF   THE 
REQUIREMENTS FOR
THE DEGREE OF



BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY





NOVEMBER 2025 
APPROVAL SHEET


This capstone outline project entitled: “eRehistroPH: CIVIL REGISTRY MANAGEMENT SYSTEM BASED ON ARTA WITH DATA ANALYTICS,” prepared and submitted by SANDARA LARIEGO SIATOCA & ALISER JAY CATUNAO VALDERAMA in partial fulfillment of the requirements for the degree of Bachelor of Science in Information Technology, is hereby accepted.

MARK JULIUS B. NOVAL, MIT		        NEL PANALIGAN, MSIT Member					     Member
       _________________			           __________________
  Date Signed				                  Date Signed


   KRIS BAHAYA LPT, MIT                      DOMINGO V. ORIGINES JR., IT. D
Adviser			                       Chairperson
_________________		                 _________________
  Date Signed				                  Date Signed


	Accepted and approved in partial fulfillment of the requirements for the degree of the BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY (BSIT).


DOMINGO V. ORIGINES JR., IT. D
Chairperson, Computing Department
	
			
Date signed

EDUARDO F. AQUINO, RPAE, MSME
Dean, College of Computing, Engineering, and Technology

			
Date signed 
TABLE OF CONTENTS 


PRELIMINARY PAGES	PAGE
	
TITLE PAGE	i
APPROVAL SHEET	ii
TABLE OF CONTENTS	iii
LIST OF FIGURES	vi
LIST OF TABLES	x
LIST OF APPENDICES	xi
	
CHAPTER I THE PROBLEM AND ITS BACKGROUND
Introduction	1
Objectives of the Study 	4
Scope and Limitations	8
Significance of the Study	9
Definition of Terms	10
	
CHAPTER II REVIEW OF RELATED LITERATURE AND STUDIES
Related Literature	12    
Literature Map of the Study	13   
Master Data Management	14    
Civil Registry	15    
Data Analytics	17    
Data Gathering	18    
Descriptive Analytics	20    
Diagnostic Analytics	21     
Predictive Analytics	23     
Real-Time-Analytics	25
Web Based System	27
SMS Notification	29
Collected Data	31
Related Studies	32
List of Systems Related to the Study	32
Conceptual Framework of the Study	36
	
CHAPTER III METHODOLOGY	
Capstone Locale		38
System Design	39
Requirements 	40    
System Requirements	41
Software Used	41
Hardware Used	43
Data Used	44    
    Datasets 	45
Data Dictionary 	45
Design	49
Diagrams	50
Use-case Diagram of the System	51
Data Flow Diagram of the System 	52
Entity Relationship Diagram of the System	53
Operational Framework of the Study 	54
Graphical User Interface of the Study	55
Develop	60
Implementation Activities	60    
Flowchart of the eRehistroPH	60
Testing and Evaluation	61
Respondents 	63
Sampling and Design Technique	65
Evaluation Procedure	65
Survey Instrument of the Study	66
Likert Scale of Measurement for Functional Suitability, Performance Efficiency, Reliability, Usability, and Maintainability	

     67
Statistical Tools	68
Deployment Activities	69
Installation Activities	70
Maintenance Activities	74
Backup and Recovery Activities	76
	
REFERENCES	129
	
APPENDICES	135
	
CURRICULUM VITAE	171

 
LIST OF FIGURES


FIGURE	TITLE	PAGE
		

1	Literature Map of the Study	13
		
2	Conceptual Framework of the Study	37
		
3	Capstone Locale of the Study	      38
		
4	Agile Development Model of the System	39
		
5	Database Structure of municipality of sulop	46
		
6	Database Structure of e_kalinga	      47
		
7	Data Structure for e_kalinga Database		     49	
		
8	Use Case Diagram of the System	      51
		
9	Data Flow Diagram Of the System	      52
		
10	Entity-Relationship Diagram of the System	         
53      
		
11	Operational Framework of the System		54            
		
12	Citizen Dashboard Interface of the eRehistroPH  	56
		
13	Mockup GUI of eRehistroPH Admin Dashboard  	       
57       
		
14	Super Admin Dashboard Overview	       
58       
		
15	Login and Registration Interfaces of the eRehistroPH Portal		       59	       
		
16	Flowchart of the eRehistroPH	60              
		
17	Buy a Hosting Server and a Subdomain Name	70              
		
18	Adding Subdomain Name to the Website	 71
		
19	Set Up the Subdomain Name	72
		
20	Transfer the Laravel Project File in Hostinger	72    
		
21	Integrating the database	73       
		
      22	Set up web application Settings.	73
		
23	Check the Web Functionality	74
		
24	Editing the Source Code	75       
		
25	Updating the Project Remotely	75
		
26	Daily and Weekly Backups on Hostinger	76
		
27	 Upload Project File to GitHub	77
		
28	Graphical user Interface for Super Admin Module that Manage User Accounts and Roles	79
		
29	Pseudocode of the Super Admin User and Role Management	80
		
30	Graphical user Interface for Super Admin Module that provides an overview of Approved Certificates	81
		
31	Pseudocode for Super Admin Module that provides an overview of request transactions	82
		
32	Graphical user Interface for Super Admin Module that Oversee the Display of Data Analytics	83
		
33	Pseudocode for Super Admin Module that Oversee the Display of Data Analytics	84
		
34	Graphical User Interface for Admin Module that Process Users’ Documents and Appointments	85
		
35	Pseudocode for Admin Module that Process Users’ Documents and Appointments	86
		
36	Graphical User Interface for Admin Module that Generates Document Reports	87
		
37	Pseudocode for Admin Module that Generates Document Reports	88
		
38	Graphical User Interface for Admin Module that Tracks Transaction Logs for Civil Registry Services	89
		
39	Pseudocode for Admin Module that Tracks Transaction Logs for Civil Registry Services	90
		
40	Graphical User Interface for Admin Module that Generates Periodic Data Analytics Reports	91
		
41	Pseudocode for Admin Module that Generates Periodic Data Analytics Reports	92
		
42	Graphical User Interface for Admin Module that Searches User Data and Related Information	93
		
43	Pseudocode for Admin Module that Searches User Data and Related Information	94
		
44	Graphical User Interface for Admin Module that Displays Received Feedback from Users	95
		
45	Pseudocode for Admin Module that Displays Received Feedback from Users	96
		
46	Graphical User Interface for Admin Module that Generates and Prints User-Filled Forms	97
		
47	Pseudocode for Admin Module that Generates and Prints User-Filled Forms	98
		
48	Graphical User Interface for User Module that Allows Users to Book an Appointment	99
		
49	Pseudocode for User Module that Allows Users to Book an Appointment	100
		
50	Graphical User Interface for User Module that Displays Processing Time for Each Type of Civil Registry Transaction	101
		
51	Pseudocode for User Module that Displays Processing Time for Each Type of Civil Registry Transaction	102
		
52	Graphical User Interface for User Module that Receives Status Updates for Appointment Approval	103
		
53	Pseudocode for User Module that Receives Status Updates for Appointment Approval	104
		
54	Graphical User Interface for User Module that Provides a Feedback Submission Feature	105
		
55	Pseudocode for User Module that Provides a Feedback Submission Feature	106
		
56	Graphical User Interface for User Module that Displays Online Form Submission Outcome for Civil Registry Documents	107
		
57	Pseudocode for User Module that Displays Online Form Submission Outcome for Civil Registry Documents	108
		
LIST OF TABLES


TABLES	TITLE	PAGE
		
1	List of Systems Related to the Study	32
		
2	Software Requirements for System Development	42
		
3	 Hardware Requirements for System Development	44
		
4	Distribution of Respondents	64
		
5	Likert Scale Measurement for Functional Suitability, Performance Efficiency, Reliability, Usability, and Maintainability	68
		
6	Evaluation Ratings from the Respondents (Super Administrator, and Advisory Committee) in terms of Functional Suitability for the Super Administrator Module.	110
		
7	Evaluation Ratings from the Respondents (Administrator, and Advisory Committee) in terms of Functional Suitability for the Administrator Module.	113
		     
8	Evaluation Ratings from the Respondents (User/Citizen, and Advisory Committee) in terms of Functional Suitability for the User/Citizen Module.	     115
		
9	Descriptive Rating of the Summary of Functionalities	117
		
10	Summary of User Rating based on ISO 25010 Software Quality Framework	120
		


LIST OF APPENDICES


APPENDIX	TITLE	PAGE
		
1	Filled-up Survey Questionnaire	136
		
2	Raw/Tabulated Data	151
		
3	Acceptance Form	152
		
4	Relevant Source Code	156
		
5	Nomination Form	165
		
6	Application for Outline Defense	166
		
7	Capstone Outline Processing Form	167
		
8	Permit to Conduct	168
		
9	Photo Documentation	169
		
10	Communication Letters	170











 
CHAPTER I


THE PROBLEM AND ITS BACKGROUND


Introduction


	In the current digital era, government services play a crucial role in society. Governments are tasked with various responsibilities aimed at enhancing the well-being of their citizens. The effectiveness of government services is determined by the level of satisfaction expressed by the public. Well-functioning services increase confidence and trust in government institutions. While poor services may result in  frustration and reduced the confidence in the governments ability to solve societal issues. Client satisfaction is a key indicator of government services, as it reflects responsiveness, accessibility, and effeciency. Satisfied clients are more likely to support government programs, thereby fostering a cycle of engagement and cooperation (Carreon, 2024).
As stated by the Presidential Communications Office on May 31, 2023, President Ferdinand R. Marcos Jr. emphasized his administration's commitment to digitizing all government transactions, including those of local government units (LGUs), to boost the effectiveness and accuracy of public service delivery. In his address at the 86th Anniversary of the Government Service Insurance System (GSIS) in Pasay City, the President underscored the need for both national and local government agencies to fully adopt digital tools to address the complexities of its operations. He further highlighted the importance of digital transformation in today's rapidly advancing technological landscape, stressing the necessity for enhanced organizational efficiency, data reliability, and security, particularly in vital services such as civil registration.
 A civil registry is an official system maintained by governments to record vital events in the lives of citizens and residents, such as births, marriages, and deaths. The process, known as civil registration, ensures the continuous, permanent, compulsory, and universal recording of these events, as mandated by law. 
According to the study of Jackson et al. (2018), civil registration is defined as the continuous, permanent, compulsory, and universal recording of the occurrence and characteristics of vital events, notably births and deaths, but also marriages, adoptions, and divorces as mandated by the legal or requirements in each country. It is crucial as unregistered people exist outside the official system—lacking a legal identity, they cannot be formally employed, pay taxes, or gain access to essential might be denied services such as healthcare, education, or social protection.
Interviews conducted at the Municipality of Sulop in Davao del Sur, revealed several long-standing issues in its civil registry system. Due to the large number of people, many residents in Sulop were not able to receive immediate assistance and were instructed to come back the following day. Furthermore, the civil registry in Sulop, Davao del Sur, still operates on outdated Windows XP software. This has resulted in slow processing inefficiencies, restricted functionality, and a heightened risk of data loss, as the system is no longer supported and incompatible with moder technologies. 
To Address these challenges, the proponents propose a capstone project entitled: “eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics”. The project aims to modernize and improve the civil registry processes through digital technology and data analytics. The goal is to enhance the efficiency and accessibility of handling vital documents like birth certificates, marriage licenses, and death certificates, while enabling the generation of accurate reports. The project will create a Progressive Web Application (PWA), streamlining the processing of civil registry documents more efficient for the people of Sulop, government workers, civil registry personnel, and other users of public services.
eRehistroPH will feature automated processes, including notifications to citizens regarding the approval of their appointment dates by the admin. The system will adopt an ARTA-compliant document processing timeline based on prescribed processing durations: 3 days for simple transactions, 7 days for complex transactions, and 20 days for highly technical transactions. Additionally, it will incorporate automatic record tracking to maintain data accuracy and prevent data loss. Users will have access to forms to complete online prior to their visit to the Sulop Civil Registry office. The system will be designed with distinct roles for administrator, super administrator, and citizen user, each with access rights appropriate to their responsibilities.

Objectives of the Study 


The study eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics aims to modernize the Municipality of Sulop's civil registry by aligning it with the Anti-Red Tape Act (ARTA) standards. This project involves developing a web-based platform or PWA with integrated data analytics to enhance the efficiency, accuracy, and accessibility of civil registry services for administrative personnel and the public. 
Specifically, it aims to:
	Develop a page for the Super Admin module with the following functionalities:
	Manage user accounts;
	Manage user roles;
	Display requests transactions for the following;
	List of birth certificate released;
	List of marriage license released;
	List of death certificate released; and
	List of marriage certificate released;
   1.4 Display Data analytics for the following:
    1.4.1 certificate request by type;
    1.4.2 Monthly transaction trend.
    1.4.3 Most request document; and
    1.4.4 Highest clients in each Baranggay;
	Develop a page for the Admin module with the following functionalities;
	Process users documents with the following;
	Approve or Reject users appointment; and
	Manage document requests.
             2.2 Generate reports for the following;
                   2.2.1 Birth certificate;
                   2.2.2 Marriage Certificate;
                   2.2.3 Death certificate; and
                   2.2.4 Marriage License;
             2.3 Track transaction logs for the following services provided:
                   2.3.1 Requests for Birth Certificates;
                   2.3.2 Requests for Marriage Certificates;
                   2.3.3 Requests for Death Certificates;
                   2.3.4 Requests for Marriage Licenses.
              2.4 Generate the following periodic data analytics reports:
                    2.4.1 Number of birth, death, and marriage registrations;
                    2.4.2 Top requested certificate types; and
                    2.4.3 User appointment attendance rate.
             2.5 Search users data to view related information by the following;
                    2.5.1 User profile;
                    2.5.2 Household Groupings;
                    2.5.3 Relationship to Head.
             2.6 Display receive feedbacks from users;
             2.7 Generate and print user-filled and forms.
	Develop a Users module with the following functionalities:
	Allow users to book an appointment;
	Display the processing time for each type of civil registry transaction;
	Receive status updates for appointment approval.
	Provide a feature for users to submit feedback; and
	Fill out online form outcome for the civil registry document;
	Implement and evaluate the system in terms of:
	Performance Efficiency;
	Usability;
	Functional Suitability;
	Compatibility;
	Security;


Scope and Limitations 


The eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics aimed to modernize civil registry operations in the Municipality of Sulop, Davao del Sur, by adhering to the standards set by the Anti-Red Tape Act (ARTA). This initiative involved the development of  a web-based platform or Progressive Web Application (PWA) designed to improve the efficiency, accuracy, and accessibility of civil registry services for administrative staff and the public. 
The system  featured a Super Administrator module for managing user accounts, roles, and displaying transaction requests, along with data analytics regarding certificate requests, transaction trends, and registrations. The Adminnistrator module facilitated the processing of document requests, generation of reports for various civil registry documents, and the ability to track transaction history and monthly data analytics, as well as the automation of form printing completed by users. The User module will allowed individuals to schedule appointments, receive updates on their status, provide feedback, and complete civil registry documents online.
Furthermore, the system was assessed  based  on  performance
 efficiency, usability, functional suitability, compatibility, and security. However, the scope of the system was limited to the Municipality of Sulop, and its effectiveness may have been affected by factors such as internet connectivity, user’s technical skills, and device compatibility. The testing phase was also be time-bound, and any future enhancements or features may have required additional time for their integration.

Significance of the Study

The study was significant to the following individuals:
Municipality of Sulop Civil Registry Office. The output supported the modernization of the civil registry system by introducing a web-based platform that enabled better record management. It will helped reduce delays and improved data accuracy, while also provided advanced analytics for efficient monitoring and reporting.
Residents of Sulop. The residents directly benefited from the system by being able to book appointments online for the processing of birth certificates, marriage licenses, marriage certificates and death certificates. It ensured a more efficient and streamlined process, consistent with the standards of the Anti-Red Tape Act (ARTA), and reduced unnecessary delays and long queues at the Municipal Civil Registry Office in Sulop.
Civil Registry Staff. The research output assisted the personnel in more efficiently managing their work by using automation in data entry and tracing document processes. This approach will guaranteed secure, accurate, and updated records, while also enhanced workflow efficiency.
Future Researchers and Developers. The study provided a foundation for subsequent research and development efforts, provided methodologies and lessons to inspire the development of e-governance solutions. Its findings served as a references for the development and enhancement of public sector programs.
Local Government Officials. The results provided local government officials with detailed data analyses and performance assessments, enabled them to make informed decisions and improved governance and public service delivery.

Definition of Terms


To help understanding and a better grasp of the terminologies utilized in the study, the following concepts were operationally defined:
Desktop. It referred to the web-based platform's admin interface. Civil registry employees handled and processed records, monitored system performance, and printed office reports.
Document Tracking.  It referred to the tracking of status, as in the civil registry, from processing to release and reported through the system, including letting the residents know if copies of requested documents were available to fetch at the office.
MYSQL.  It referred to MYSQL as a relational database management system that efficiently stored, managed, and retrieved data.
Record Management. It referred to the process of storing, organizing, and maintaining civil registry records, including birth certificates, marriage licenses, and death certificates, in a secure and accessible way within the system.
Smart Phone.  It referred to a mobile phone. Through the mobile app, residents could view the status of the requested documents, received notifications, and kept track of the transaction history.
Visual Studio Code. It referred to its use as a source code for coding, debugging, and building a web-based platform for administrators.
	

CHAPTER II


REVIEW OF RELATED LITERATURE AND STUDIES


Related Literature


The following chapter summarized the existing body of literature on the issue of concern. Results of available studies were extensively reviewed and compared. Such a strategy provided a foundation for the researcher to develop a pertinent hypothesis. By engaging in this process, different literary options that could provide personal interest were explored, potentially leading to the creation of unique and captivating literature.

Literature Map of the Study


A literature map provided a visual representation showing the relationships among academic papers and research studies within a field. It helped organize themes, methodologies, theories, and findings, facilitating a better understanding of the research landscape. A literature map assisted researchers in identifying gaps and trends. This tool directed future investigations and supported a targeted method of inquiry, emphasizing contributions and outlining avenues for future study.
                        Figure 1.	Literature Map of the Study

As shown in Figure 1, the authors included in this chapter offered assistance in familiarizing readers with significant and comparative data in the current study. The topic below summarized the work and supported9 the study's conduct.

 

Master Data Management 
Master Data Management (MDM) serves as a fundamental framework that guarantees the precision, uniformity, and accessibility of essential data within organizations. The research conducted by Peeters, R., & Widlak, A. (2018) illustrates that inadequately designed information systems within the Dutch civil registry’s MDM framework can lead to administrative exclusion, ultimately obstructing citizens' access to necessary public services. The findings highlight that fragmented data integration efforts worsen this problem, creating administrative hurdles that prevent individuals from acquiring crucial civil records. This division of data leads to discrepancies and obstructs seamless data interchange among administrative entities, which in turn diminishes the efficiency and effectiveness of public service delivery.
 According to the study of Rasmika, R., et al, (2023), the challenges necessitates a strategic approach to MDM, especially within public service sectors like civil registries. Their study emphasizes the need for data centralization to assure its accuracy and timely accessibility. By adopting a unified MDM system, public agencies can eradicate duplicate data, optimize their processes, and guarantee the fair distribution of services. This approach directly addresses the issue of administrative exclusion, ensuring that every individual, irrespective of their background, has equal access to public services. The research supports a collaborative MDM strategy that would not only enhance service delivery but also foster transparency within public institutions. 
Additiuonally, Master Data Management (MDM) is crucial for preserving data integrity and ensuring that public services are accessible to all. As noted by Peeters, R., & Widlak, A. (2018), administrative exclusion poses a significant challenge when data systems lack integration, while Rasmika, R., et al, (2023) propose a solution through centralized MDM strategies. According to the scholars, a cohesive MDM approach is vital for tackling the issues related to data fragmentation, enhancing operational efficiency, and guaranteeing that all citizens have equitable access to essential public services. Therefore, the implementation of robust MDM systems is critical for promoting transparency, inclusivity, and improved service delivery in the public sector.

Civil Registry
Civil registry is the system by which a government records vital events such as births, marriages, and deaths of its citizens and residents. The system serves two primary purposes: to produce legal documents such as certificates that establish and protect the rights of individuals, and to provide a reliable source of vital statistics for government planning and services. 
According to the study of Carreon (2024), the terminology and structure of civil registration systems vary across countries and jurisdictions. The system may be called a civil registry, civil register, or vital records. At the same time, the office in charge may be known as a registrar, registry office, or population registry. It emphasized that civil registration ensures individuals’ legal identity and access to public services.
Furthermore, the study of Hoti et al., (2022), explain that civil registries increasingly rely on interconnected digital systems such as web services, which allow various institutions to access and use personal data to deliver services efficiently. However, the interconnectivity raises serious concerns about the misuse of personal data, thus highlighting the need for enhanced data protection and improved reliability of personal information. As a solution, governments and institutions must adopt stricter data security measures, establish clear privacy policies, and invest in the digital training of personnel. Despite the advancements, challenges remain, particularly in areas with limited infrastructure, such as remote islands or rural regions, where access to civil registration services is difficult. 
Additionally, civil registration systems are essential for legal identity and national development. Ensuring data security and service accessibility—especially in underserved areas—remains a critical priority for sustainable and inclusive governance.

Data Analytics	
Data analytics examines, cleans, transforms, and models data to discover useful information, support decision-making, and generate actionable insights. It is increasingly used across disciplines for system improvements, problem-solving, and resource optimization.
 	Ervural (2024) emphasizes the increasing significance of data analytics in enhancing service quality across various sectors, including public administration. In a related study, Lascuña & Junsay (2023) explored the impact of service quality dimensions—reliability, empathy, ease, and timeliness—on customer satisfaction in civil registry services. Employing a quantitative predictive design, the researchers surveyed 300 respondents and utilized descriptive statistics, correlation tests, and multiple regression analysis. Their findings indicated a moderate to strong positive relationship between service quality dimensions and customer satisfaction, with the regression model accounting for 77.6% of the variance in satisfaction and 60.2% of the overall variability. 
Furthermore, the study demonstrated that applying statistical and predictive analytics helps identify and prioritize key factors influencing satisfaction, guiding improvements in public service delivery. However, a critical problem remains ensuring consistent service quality across different branches or local government offices, especially in areas with limited resources or outdated systems. Additionally, integrating data analytics in civil registry services provides a valuable framework for understanding and enhancing customer satisfaction, ultimately promoting better governance and more responsive public service systems.

Data Gathering
Data gathering collects essential personal information about life events such as births, deaths, marriages, and divorces. The information is typically sourced from institutions such as hospitals and courts and directly from citizens, and is recorded manually or digitally. Accurate and timely data collection plays a vital role in government planning, the provision of public services, and the issuance of legal documents. 
According to the study of Devi et al. (2024), observation, interviews, and documentation are appropriate data collection techniques under a descriptive qualitative methodology, as the methods allow for a deeper understanding of real-life situations and institutional experiences. The researchers emphasized the importance of using multiple techniques to ensure data validity and reliability. It aligns with the findings of Creswell & Creswell (2018), who argued that combining various qualitative data collection strategies enhances the comprehensiveness and trustworthiness of research findings, particularly in studies involving organizational behavior and institutional processes. In terms of the system, civil registries often depend on traditional and digital channels for collecting and verifying personal information. The data inputs are then processed and stored for legal and administrative use. To improve data accuracy and richness, employing multiple qualitative methods provides a solution, as it helps researchers and practitioners gain insights into actual procedures, behaviors, and service dynamics within the registry system.
Furthermore, a common problem is the limited accessibility of registration services in geographically remote areas and inconsistent or delayed reporting of vital events. In conclusion, a strong, multi-method approach to data gathering enhances the reliability of civil registry systems. It supports the development of inclusive and efficient public services, especially when addressing data accuracy and service reach challenges.

Descriptive Analytics 
Descriptive analytics evaluates past and present data on significant life events such as births, deaths, marriages, divorces, and migrations. It is a type of analysis that is essential for summarizing patterns and visualizing trends, which contribute to more effective resource allocation, policy development, and informed decision-making. 
According to the study of Sari et al., (2022), It employed a descriptive-analytical method to detail a specific court decision while analyzing various aspects relevant to the case. Descriptive research is conducted systematically, factually, and accurately, ensuring a reliable representation of the studied issues. The perspectives underscore the value of descriptive analytics in civil registry systems, where understanding patterns and trends can enhance institutional performance. 
The study of De Guzman & Tamayo (2024) applied its approach in assessing the effectiveness of civil registration services in Calamba City, Laguna, Philippines. Using a descriptive method, the researchers gathered public perceptions on the registration processes of births, marriages, and deaths. While respondents generally viewed the services as effective, variations in perception were noted based on factors such as sex, age, marital status, and education. Descriptive analytics supports a system that allows stakeholders to interpret service effectiveness based on demographic and experiential data.
Furthermore, the method enables civil registry offices to identify service gaps and adjust strategies according to population needs. However, a key problem is the varying satisfaction levels among demographic groups, which may reflect inconsistencies in service delivery or communication. Additionally, descriptive analytics offers a powerful tool for civil registry offices to monitor, assess, and improve public services through data-driven insights, promoting more equitable and efficient administrative processes.

Diagnostic Analytics
One method of data analytics called diagnostic analytics seeks to identify the underlying causes of patterns or problems that have been noticed. Diagnostic analytics looks at why something happened, as opposed to descriptive analytics, which concentrates on what has already happened. Diagnostic analytics are essential for detecting inefficiencies, issues with service delivery, and sociodemographic differences that impact institutional performance and public access in civil registration and vital statistics (CRVS) systems.
The Philippine Statistics Authority (2021), in its case study titled "Improving Philippine Civil Registration and Vital Statistics Through Digital Transformation," utilized diagnostic analytics to evaluate the weaknesses of the country's traditional CRVS systems. Through the evaluation, the PSA identified key problems such as manual processing delays, poor inter-agency coordination, and unequal access to registration services in remote areas. Based on these findings, the system was redesigned to include digital registration, real-time data processing, and integration with the Philippine Identification System (PhilSys). The changes were aimed at improving both efficiency and inclusivity. However, despite the improvements, the agency still faces challenges related to outdated local infrastructure and uneven implementation across municipalities. The study concluded that diagnostic analytics is critical in shaping responsive policies and technical reforms that directly target bottlenecks in civil registration processes.
Thus, according to the study of Villena et al. (2021), "Analysis on Acquisition of Philippine Civil Registry Documents and Inclination Towards Paperless E-Government," applied diagnostic analytics to assess citizen experiences with acquiring civil documents. The analysis revealed several service-related issues, including long wait times, the lack of digital options, and inconsistent procedures across local civil registry offices. Based on it’s findings, the researchers recommended shifting toward a fully electronic, paperless system to reduce processing delays and improve citizen satisfaction. Its proposed solution aims to eliminate redundant steps and standardize processes nationwide.
 A recurring problem was the slow pace of digital transition, especially in less-developed areas where internet connectivity and digital infrastructure remain weak. The study concluded that diagnostic analysis is essential for understanding user pain points and guiding the transition toward modern and accessible civil registry services.

Predictive Analytics	
Using statistical models and historical data to predict future occurrences or outcomes is known as predictive analytics. Future service demands, patterns like under-registration in specific areas, and improving the general quality and coverage of population data are all predicted using this strategy in civil registration. Through proactive response and optimization of civil registry operations, governments can foresee gaps and difficulties before they arise.
The systematic review conducted by Phillips et al. (2019) on civil registration and vital statistics (CRVS) systems across 25 countries demonstrated that predictive analytics can play a pivotal role in advancing CRVS development. By identifying demographic, economic, and geographic factors associated with under-registration, the study highlighted the ability of predictive models to detect populations at risk of being excluded from registration systems. This insight enables governments to design more targeted outreach strategies. As a result, the application of predictive analytics evolved from a passive data interpretation tool to an active mechanism for resource allocation and service delivery planning. However, the study also identified the challenge posed by the limited availability of high-quality input data, which can compromise the accuracy of predictive outcomes. Despite this, the authors concluded that predictive analytics offers timely and actionable insights that significantly enhance the reach and effectiveness of civil registry systems.
In a related study, Mikkelsen et al. (2020) focused on the incomplete and inconsistent registration of vital events in many countries. The study emphasized how predictive analytics can be employed to identify patterns and gaps in data, particularly in areas with low birth registration rates. By utilizing forecasting models, governments can intervene earlier and more effectively, particularly in communities at risk of being excluded from official records. The predictive approach also facilitates the prioritization of regions requiring technical support and policy interventions. Despite the advantages, the study noted that many national CRVS systems continue to lack the digital infrastructure and analytical capabilities needed to implement large-scale predictive tools. Nonetheless, the authors concluded that predictive analytics remains a robust approach for bridging registration gaps and strengthening institutional planning.
Collectively, these studies affirm that predictive analytics is not only a technological innovation but also a strategic solution for modernizing civil registration systems. By providing foresight into future challenges and service needs, predictive analytics enables governments to ensure more equitable coverage, thereby enhancing their capacity to recognize, protect, and plan for all citizens.

Real-Time-Analytics
Real-time analytics facilitates the immediate collection and analysis of data, enabling instant insights and actions. In civil registration systems, this allows vital events such as births, deaths, and marriages to be recorded and monitored instantly, improving service speed, accuracy, and responsiveness.
McDowall & Mills (2019) examined the role of cloud-based systems in enhancing civil registration through real-time data collection. They found that cloud platforms enable civil registry offices to enter and retrieve data in real-time, even in remote areas, facilitating continuous monitoring. This capability helps detect delays or discrepancies and enables immediate corrective actions, especially in low-infrastructure regions where traditional systems are slow and error-prone. The study concluded that real-time analytics in cloud-based systems significantly improves the efficiency and reliability of civil registration.
Similarly, Musadad & Angkasawati (2023) studied the application of real-time data processing in Indonesia’s civil registration system. Their findings showed that real-time monitoring allowed local government units to quickly identify and address registration gaps, improving data accuracy and service delivery, particularly in remote areas. However, they noted challenges in ensuring all units had the necessary infrastructure for effective implementation. The study emphasized that real-time analytics is crucial for enhancing CRVS systems, ensuring up-to-date and reliable records.
The two studies highlight the transformative potential of real-time analytics in civil registration, enabling faster decisions, improved service delivery, and accurate vital event records, even in challenging environments.

Web Based System
Web-based systems in civil registry operations have revolutionized the accessibility, efficiency, and accuracy of vital event registrations, such as births, deaths, and marriages. The systems are crucial for the digital transformation of civil registration, offering faster processing and reducing the errors inherent in manual data entry, ultimately improving public service delivery.
Villena, et al., (2021) conducted a study on the transaction of civil registry documents in the Philippines, investigating the feasibility of transitioning to a paperless e-government system. Through surveys and service blueprint analysis, the study assessed how citizens currently obtain required documents and it’s openness to adopting digital alternatives. The findings indicated high usage of online services and emphasized the benefits of implementing a web-based system for requesting civil registry documents. The study proposed including security features like QR codes or barcodes to enhance document verification and delivery processes. The study concluded that a web-based system can simplify civil registration services, reduce processing times, and significantly increase citizen satisfaction by offering a more convenient and accessible method for acquiring vital records.
Similarly, the study of Hussain & Bairwa (2023) evaluated the effectiveness of the 'Pehchan' portal in Rajasthan, India, which allows citizens to register births, deaths, and marriages online. The portal enables individuals to apply for civil documents and receive certified copies with electronic signatures. Since its implementation, the 'Pehchan' portal has registered millions of civil events, significantly improving data quality and access to information in the state. The study also highlighted the significant role web-based systems play in enhancing the accessibility of civil registration services, particularly in rural and remote areas where physical access to government offices may be limited. The authors concluded that web-based systems, like 'Pehchan,' can revolutionize civil registration by providing citizens with greater access, convenience, and security in obtaining vital records.
Additionally, the study demonstrated the transformative potential of web-based systems in modernizing civil registration services. By offering accessible, secure, and transparent alternatives to traditional paper-based methods, web-based systems improve service delivery and ensure citizens can easily access the vital records, irrespective of location. The innovations pave the way for more efficient and inclusive civil registry operations, enhancing public service in the digital age.

SMS Notification
The goal to enhance civil registration systems, mobile technology, particularly SMS notifications, has emerged as a practical and cost-effective tool for improving the delivery of services and the timely notification of vital events like births and deaths. SMS-based systems are especially advantageous in regions with limited internet coverage, ensuring that civil registration services remain inclusive and accessible, even in remote areas.
According to the study of Van der Straaten (2021), conducted in Tanzania examined using SMS-based reporting systems to improve birth and death registration coverage. In the model, local informants, trained to use SMS technology, send notifications to a central system whenever a vital event occurs in the area. The system updates the civil registry database in near real-time, significantly enhancing the timeliness and completeness of registrations, especially in rural and difficult-to-reach regions. The study concluded that SMS technology offered a cost-effective and scalable solution, addressing challenges in resource-constrained settings and improving the overall efficiency of civil registration systems.
Similarly, according to the study of Tahsina et al. (2022), a pilot study in Bangladesh assessed the impact of SMS notifications on civil registration. In the study, community health workers sent SMS notifications of births and deaths to a central data repository, which led to a remarkable reduction in registration delays and improved the accuracy of civil records. The researchers emphasized that integrating SMS notification systems into civil registration processes can significantly enhance data quality, support vital statistics systems, and facilitate better policy and public health planning. The authors concluded that SMS-based systems effectively improve the speed and accuracy of civil registration, especially in regions with limited infrastructure.
Additionally, the studies confirm that SMS-based systems can be integral to modernizing civil registry services. By enabling real-time communication and reducing reliance on manual processes, the systems ensure better registration rates and accurate, up-to-date vital statistics, which are essential for informed decision-making and policy development.


Collected Data
Data collection involves gathering and analyzing reliable information to address research questions, uncover patterns, and inform decision-making. In civil registry services, data collection is vital for assessing service implementation and identifying challenges.
Febrizal et al. (2023) employed a qualitative descriptive approach, using interviews and observations as the primary data collection tools. Purposive sampling was used to select informants with relevant experience. Data analysis included reduction, presentation, and conclusion-making, revealing valuable insights into the complexities of civil registration systems.
Similarly, Rasmika et al. (2023) conducted interviews and observations, utilizing an interactive model for data analysis. Their study found that the Dukcapil Office in Penajam Paser Utara Regency had successfully integrated technology and online systems to improve the efficiency of civil registration processes.
This approach is relevant to the present study, which uses qualitative methods to explore civil registry operations. By interviewing registry officers, government personnel, and stakeholders, the study aims to gather informed and contextually relevant insights, ensuring the credibility and authenticity of the findings.
Related Studies


Related studies were reviews or research studies conducted by the researcher or experts in the field that explored similar topic themes or issues, provided context, support, or contrast to the current research being undertaken, helped to frame the research problem, justified the methodology, and identified gaps in existing knowledge. Here was a list of system-related studies.

List of Systems Related to the Study


	As shown in Table 1, the research paper discussed different studies about civil registry systems, the different systems that had been used and applied in civil registry, and the advantages and disadvantages of the various algorithms employed in the systems.
Table 1. List of Systems Related to the Study
Name of Systems	Author/Year	Description in the System	Strength in the System	Weakness in the System	Application
Optimizing Registry of Inhabitants’ Record Management: The Development of Municipal Consolidation System for Local Governance	Manun-Og, M., & Flores, J. B. (2023)
	The development of a Municipal Consolidation System aimed at optimizing the registry of inhabitants' records management and addressing challenges faced by local government units (LGUs).	The study improves residents' records management through systematic development, cross-platform support, and validated usability.	The system lacks details on sample size, performance under high usage, security measures, and potential implementation challenges.	Cross-Platform Application
Population Registration Information System (SIREP)	(Novitaningrum et al., 2024)	The sytem evaluates SIREP, a population registration system used by the Tegal Regency Civil Registry Service, assessing its effectiveness in managing records and improving administration	The system evaluates SIREP’s impact on village-level administration using a qualitative approach, highlighting its success in transparency and efficiency.registration.
	The system Staff shortages, low public awareness, and inadequate facilities hinder implementation, while lack of data limits depth.	Web-Based System
CCRVS system (Civil Registration and Vital Statistics system)	Silva, R. (2022).	The paper reviews CRVS systems' role in development, highlights population research contributions, and explores insights, challenges, and future directions for improving vital registration.	The system ensure accurate, inclusive, and secure vital event registration while supporting scalability and integration. 	The CRVS systems face data gaps, registration delays, limited coverage, and emerging implementation challenges.	Web-Based System
Performance of national civil registration and vital statistics systems	(Mikkelsen et al., 2023)	The study evaluates global civil registration and vital statistics systems, proposing strategies to improve health sector engagement, cause of death diagnostics, and system development pathways.	The System Global assessment, actionable recommendations, and priority interventions for diverse countries.	The system Limited focus on non-health factors, reliance on potentially inaccurate public data, and generalized recommendations.	Web-Based System


As shown in Table 1, the study by Manun-Og & Flores (2023) developed a municipal consolidation system that maximizes the management of residents' records at the municipal level in the Philippines. It integrates data for barangay residents with real-time updates and synchronization of household profiles. Its functions include demographic classification, population monitoring, and electronic profiling that enable effective delivery of services and local planning. Such a system is particularly valuable for improving local government and reducing duplication in data processing.
Similarly, Novitaningrum, et al., (2024) explored the SIREP (Sistem Informasi Registrasi Penduduk), an e-Government system developed in Tegal Regency, Indonesia. The system enabled civil events such as births and deaths to be reported online at the village level, directly linking local offices with the central civil registry. It also includes real-time status tracking, data validation, and duplicate checking features, drastically reducing registration delays and enhancing service transparency. The model is especially relevant in rural and decentralized environments, where coordination between local and central offices is often poor.
Furthermore, the study of Silva (2022) gave a broader perspective by emphasizing the importance of integrating demographic data and statistical analysis into civil registration and vital statistics (CRVS) systems. The study advocates using population opinions and analytics to inform policy, enhance inclusiveness, and support national planning. A civil registry system, besides capturing data, should enable more in-depth analysis to inform decision-making and public health strategies.
Furthermore, the study of Mikkelsen et al. (2023) also conducted a global review of CRVS systems to ascertain vital components of effective systems. Such components are electronic integrated platforms, automated data verification, health facility reporting in real time on events, and effective data protection systems. The study proved that countries with improved civil registry systems achieved greater coverage, precision, and public trust, emphasizing interoperability across institutions.
Additionally, the studies refer to the growing trend towards digitalization in civil registry management, showing how centralized databases, web-based access, and intelligent analytics-based systems can lead to more responsive and transparent public service. The lessons are especially applicable in system design for geographically remote locations like island municipalities, where quick and accurate registration remains an issue.

Conceptual Framework of the Study


A study concept served as a roadmap that organized key research components question, literature review, methodology, and data analysis toward achieving the study’s objectives. The study contributed to the development of eRehistroPH, a system designed to enhance civil registry services by applying information and communication technology innovations. 
The conceptual framework illustrated the eRehistroPH System, a Progressive Web Application (PWA) designed for web. Citizens registered and submitted personal information for verification. Administrators reviewed registrations and either approved or rejected registration. They also verified appointment requests. Upon completion of the verification process, administrators printed documents for approved citizens. Only authorized users could log in to select documents, complete forms, schedule appointments, and provide feedback. Super Administrators oversaw account management and generated monthly and annual reports. All data was stored securely in a centralized Structured Query Language (SQL) database, which supported record management and core system functions.
 
          Figure 2.	Conceptual Framework of the eRehistroPH
 
CHAPTER III


METHODOLOGY 


Capstone Locale


A capstone locale referred to the specific environment or context in which a capstone project was carried out. Figure 3 presented the location of the  Municipal Hall of Sulop, Davao del Sur, Philippines.
 
                  Figure 3.	Capstone Locale of the Study


Figure 3 illustrated that the study was conducted in the Municipality of Sulop, specifically at the Municipal Hall, where the Civil Registry Office was situated. The location served as the site for data gathering and system testing for the web-based system implemented as a Progressive Web Application (PWA). Given that manual record-keeping placed a heavy workload on staff, there was a need to develop and implement an effective, fast, and reliable PWA that provided improved services for both administrators and residents.

Research Design of the System


System design served as the framework of the study, encompassing the identification of components, interfaces, and data. Figure 4 illustrated the process that was followed in developing the system.
 
         Figure 4.	Agile Development Model of the eRehistroPH


Figure 4 presented the Agile model, which was particularly appropriate for building a Progressive Web Application (PWA). Agile emphasized flexibility, rapid updates, and continuous improvement through user feedback. By combining web-based features with mobile responsiveness in a single Progressive Web Application (PWA), Agile facilitated the development, testing, and enhancement of features in brief, iterative cycles, resulting in greater overall efficiency and user satisfaction.
The Agile methodology ensured the alignment of software with the study's objectives, while remaining flexible in addressing challenges that may arose during development and evaluation. Its iterative process and ongoing feedback loop enabled ongoing enhancements, leading to a more efficient and user-focused system.

Requirements 


	Requirements analysis referred to the process of gathering, analyzing, and documenting the needs and expectations of stakeholders to ensure that the system will met its intended purpose. In the first stage, the researchers will carried out the following tasks: (1) defined the specific objectives for the development of the Progressive Web Application (PWA), (2) gathered relevant data related to civil registry processes, and (3) identified the appropriate development strategies and tools for building the system.

System Requirements  
System requirements referred to the conditions and capabilities that a system must have possessed to meet stakeholder needs and ensure its successful operation.
The section presented the technical specifications required for developing the Progressive Web Application (PWA) focused on Civil Registry Services. System requirements identified the essential components necessary for the effective construction and operation of the system. A comprehensive understanding of the required software, hardware, and other critical factors was essential to ensure that all resources were available and appropriate for the system's intended use.
Software Used. The development of the system relied on a carefully selected set of software tools that ensured functionality, compatibility, and efficiency. The primary backend framework was Laravel, recognized for its robust features and scalability. To improve frontend interactivity, JavaScript was employed, facilitating dynamic user experiences. The Integrated Development Environment (IDE) used was Visual Studio Code (VSC),which provided a versatile workspace equipped with syntax highlighting, debugging tools, and version control integration. For data management, MySQL was chosen due to its reliability, scalability, and strong features, ensuring effective data storage, retrieval, and manipulation.
Table 2. Software Requirements for System Development

Software	
Specification
                    
Programming Language	
JavaScript
PHP                

Database	      
             MySQL

Operating System	  
    Windows 10, 11

Integrated Development Environment (IDE)	
   Visual Studio Code 

Framework	
 Laravel  

The necessary software for the project's development was outlined in Table 2. To maintain compatibility with the tools required, the system had to operate on devices running Windows 10, 11, or a newer versions. The main Integrated Development Environment (IDE) utilized in this project was Visual Studio Code (VS Code). This tool offered a versatile and efficient coding environment, featuring tools for syntax highlighting, debugging, and version control integration. Its lightweight design, flexibility, and extensive range of extensions made it well-suited for optimizing the development workflow. For managing the database, MySQL was utilized due to its dependability, scalability, and strong security features. It provided a high-performance relational database management system, enabling effective data storage, retrieval, and manipulation. MySQL’s capacity to handle complex queries and substantial data volumes ensured that the data management requirements of the project were adequately addressed. Collectively, these software tools established the groundwork for the system’s development, guaranteeing seamless functionality and compatibility.
        Hardware Used. Hardware used were the necessary equipment and parts required to operate the system effectively and obtain the expected outputs. Their function was to ensure that the system ran reliably and performed at its best. Table 3 displayed the chosen hardware specifications for building the system. The selected devices were thoroughly evaluated to guarantee that the system operated efficiently and without issues. The hardware components were essential during the development and testing phases, contributing to a smooth experience overall.
Table 3. Hardware Requirements for System Development
Hardware	Specification

Android Phone
		Processor: Quad-core processor or higher
	RAM: Minimum of 4 GB
	Storage: Minimum of 32 GB available storage
	OS: Android 7.0 (Nougat) or higher
	Display: 5-inch screen or larger for testing purposes

Laptop or Desktop


	Processor: Multi-core processor (Intel i5 or equivalent)
	RAM: Minimum of 8 GB
	Storage: At least 256 GB SSD for optimal performance
	Graphics: Integrated graphics (sufficient for development)
	OS: Windows 10/11 or macOS


Data Used
Data Used referred to the accessibility and readiness of data within a system, ensuring it was consistently available to authorized users when needed. In system development, it ensured that essential data was securely stored, could be retrieved quickly, and was presented in a usable format. Its importance lay in maintaining the system’s quality and accuracy without reliable data access, the system may have encountered errors or delays, affecting performance. Ensuring data availability improved decision-making, enhanced user experience, and supported seamless system operation. This was achieved through ongoing analysis of data types, sources, and acquisition methods, which informed iterative development. By refining data access and management, the system’s reliability and performance are improved, ensuring it met its goals.	
	Datasets of the Project. Datasets were groups of organized data essential for keeping accurate and efficient civil records in the system. They may have been structured or unstructured, depending on the nature of information (e.g., personal information, documents, user logs). It was essential for the operation of the system, making data into individuals, such as birth and marriage certificates, readily available and updated. These data were required to be secure, accurate, and reliable to avoid errors and maintain proper processing of civil records to ensuring the system's integrity and compliance.
          Data Dictionary of the Project. The Data Dictionary contains key information about the data used in the system. Data were obtained from the Municipal Civil Registry Office of Sulop, Davao del Sur, including birth, death, marriage, and license records.
Users must register an account with their personal details and email. The account will only be activated after admin approval, and a confirmation email is sent once accepted. The admin can also create accounts for users already listed in the records.
 
Figure 5. Database Structure of municipalityofsulop

As illustrated in Figure 5, phpMyAdmin displayed the database schema of eRehistroPH, comprising seventeen (17) structured and standardized tables that facilitated the system’s primary functions. The activity_log tracked all user activities, while appointments and appointment_slots oversaw scheduled requests. The birth_certificates and death_certificates tables housed civil registry information, and budget_allocations monitored resource distribution and linked to e_kalinga database. The certificate_requests table documented requests for documents, and dependents stored associated family details. User input was recorded in the feedback table, while marriage_certificates and marriage_license organized marriage-related records. The notifications table provided alerts to users, and pending_registrations managed accounts that awaited approval from administrators. The reports and request tables produced and oversaw system reports and transactions, while settings held system configurations. Finally, system_logs recorded activities and errors, and the users table governed all system accounts and access permissions.
 
Figure 6. Database Structure of e_kalinga
As illustrated in Figure 6, the e_tala database was created primarily for encoding data and facilitating simpler access to citizen information. This database comprised various tables arranged for profiling purposes related to demographics, geography, and socio-economic status. The barangay_household_survey_2024 table was intended for importing data, while demographic_characteristics contained information pertaining to geography, gender, family head relationships, nuclear family details, and marital status. The geographic_identifications table was associated with barangays, sitio puroks, municipalities, and provinces to provide location-based data. The community_political_participations table integrated both demographic and geographic information, which included data on barangay volunteers. Meanwhile, education_and_literacies held details about demographic and geographic data, grade levels, and reasons for school absenteeism. The family_incomes table consisted of income information linked to demographic and geographic factors. The tables ben_tala and trans_tala were utilized for budget allocation processes, while val_beneficiaries was connected to the e_kalinga database to validate beneficiary records. The e_tala database was designed to ensure the structured, integrated, and efficient management of community and household information.
 
Figure 7. Data Structure for e_kalinga Database

As illustrated in the figure 7, the e_kalinga database contained several tables, but only the tbl_offices, budget_allocations, consolidated_transaction, and master_budgets tables were utilized. These were connected to the e_tala and municipalityofsulop databases for coordinated data management and resource tracking.

User Design


The User Design was the process of outlining the structure, visual elements, and functionality of a system to address user and project needs. Its goal was to organize the components, interactions, and user interfaces in a structured manner, ensuring the system remained efficient, user-friendly, and aligned with project objectives. A well-executed design serves as the foundation for the successful implementation of the system.
The next phase of the study was the User Design, also known as the designing workshop. Following Agile principles, this stage integrated user feedback into the design process. It marked the start of establishing the system architecture, in which the framework and sequence were defined according to project specifications. A system skeleton was created to demonstrate expected functionality. Design tools such as the Entity-Relationship Diagram (ERD), Data Flow Diagram (DFD), Use Case Diagram, Graphical User Interface (GUI) diagrams, and Flowcharts were utilized to visualize system components and user interactions. The following sections presented the proposed system architecture and configurations for the eRehistroPH system.

Use-Case Diagram
A use case was a technique for defining and organizing a system's functional requirements based on the interactions of users. It specified the activities users engaged in, ensuring that the system addressed their needs. The significance of a use case model lay in its ability to elucidate roles, processes, and interactions, aligning system development with user expectations. 
As shown in Figure 8, In the civil document management system, the use case model identifies three primary actors: citizens, civil registry personnel, and system administrators. Citizens logged in, arranged appointments, completed forms, submitted requests, and tracked their status and history. Civil registry personnel confirmed data, sent notifications, produced certificates, and generated analytics. System administrators oversaw user management, adjusted settings, and managed  system operations.
 
            Figure 8.	Use Case Diagram of the eRehistroPH
		
		Data Flow Diagram (DFD) of the System. The Data Flow Diagram (DFD) graphically illustrated the flow of data through the system, showing the input, output, and process that transformed the data. The diagram helped in analyzing and designing the system and mapped out the potential bottlenecks, inefficiency, and areas to improve.
Figure 9 presented the Data Flow Diagram (DFD) for the eRehistroPH Civil Registry System, showcasing the interactions among citizens, civil registry personnel, and system administrators. Citizens submitted requests for essential records, including birth, marriage, and death certificates, which were then verified and processed by civil registry staff.
 
           Figure 9.	Data Flow Diagram Of the eRehistroPH

The personnel reviewed each submitted request, provided timely feedback, and kept citizens informed through real-time updates. Meanwhile, the system administrator oversaw request management and user accounts, and generated reports when necessary. This smooth and organized process helped ensure that requests are handled quickly and transparently, reflecting the system’s commitment to providing reliable and user-friendly civil registry services.
           Entity Relationship Diagram (ERD) of the System. The entity relationship diagram was used to visually represent the data schema or database structure, illustrating the relationships between entities within the system. It served as modeling technique in database design to depict the logical organization of data. The diagram showed how entities were stored and defined the specific requirements and functionalities of the eRehistroPH system. 
 
        Figure 10.	Entity-Relationship Diagram of the System
		Operational Framework of the Study. The operation framework defined the organization, flow, and sequence of activities within the eRehistroPH system. Covering processes from user registration to request handling, it outlined the essential tasks, procedures, and roles required to ensure smooth and efficient system operations. The framework also specified the responsibilities of each participant adminis trators, staff, and users while ensuring that all activities aligned with the system's primary goal of providing fast, accurate, and secure civil registry services. Serving as a guidebook, it helps synchronize actions among stakeholders, thereby enhancing reliability, efficiency,and overall effectiveness of the system.
 
              Figure 11.	Operational Framework of the System

Figure 11 illustrated the operational structure of the civil registry system, showing the main flow from user input to document issuance. This structure was essential in guiding the system development as it defined the necessary tasks, processes, and the role of each person, including users, staff, and administrators. The figure outlined how the system managed requests, beginning with log in and appointment booking, followed by verification, and culminating in document release. This operational flow ensured a smooth, coordinated, and efficient workflow among all stakeholders. 
		Graphical User Interface (GUI). A Graphical User Interface (GUI) combined graphics with interactive components using icons, buttons, and menus to provide users with a visual and intuitive way to navigate the system. The civil registry Progressive Web Application (PWA) featured an intuitive interface that showcased its primary services, including certificate requests, appointment scheduling, and request status tracking. This design is optimized for responsiveness, ensuring that it functioned efficiently on both  desktop and mobile devices. This user-friendly interface empowered users to navigate the system and accomplish their tasks smoothly.
Figure 12 presented the Citizen Dashboard of the eRehistroPH system, which was organized into three primary sections: Appointment Calendar, Request Status, and Recent Activities. The Appointment Calendar allowed users to select available dates for civil registry services, with status indicators showing availability, capacity, holidays, or the current date. The Request Status section provided real-time updates on the progress of requests, categorized as Pending, Rejected, or when to go, with color-coded labels to improve clarity. The Recent Activities section summarized the user's latest transactions, including reference numbers, service types, dates, and corresponding actions. In addition, the dashboard featured a feedback section that enabled users to share insights for continuous improvement of the system’s interface and services.
  
   Figure 12.	 Citizen Dashboard Interface of the eRehistroPH  

 Figure 13 presented the Admin Dashboard of the eRehistroPH Civil Registry System, showcasing vital metrics such as Active Users, Requests Processed Today, Pending Requests, and User Feedback. The dashboard included a section for Upcoming Appointments that detailed scheduled requests for certificates, featuring the applicant’s name, type, date, and status, along with options to approve, view, or reject. On the right side, the Recent Activities panel tracked updates on certificate requests, while export functionalities for PDF, Excel, and CSV formats were provided. The Transaction History section at the bottom consolidated processed records for Birth, Death, Marriage, and Marriage Licenses, whereas the Pending Registrations panel indicated new accounts pending approval. The navigation menu on the left side allowed easy access to essential modules like User Management, Schedule, Civil Registry Records, Transaction History, Budget, Reports, and System Settings, facilitating well-organized and efficient administrative functions.
 
    Figure 13.	Mockup GUI of eRehistroPH Admin Dashboard  


Figure 14 presented the Super Admin Dashboard of the eRehistroPH Civil Registry System displayed key system metrics, including the total number of users, active staff, total records, and pending requests. The sidebar on the left provided access to core modules such as reports, certificate management, user and staff management, system logs, backup and restore, and system settings. Additionally, the dashboard featured a Civil Registry Budget section that monitored fund utilization, committed amounts, and remaining allocations, offering the Super Admin a comprehensive overview of system activities and resource usage.
 
           Figure 14.	Super Admin Dashboard Overview

Figure 15 presented the eRehistroPH Portal, which featured secure pages for login and registration. On the right, the Login Page is designed for existing users, requiring a username and password, with additional options for password recovery or new account registration. On the left, the Registration Page simplified the process for new users by requesting only their email address, contact number, password, and password confirmation. This streamlined approach ensured a quick and user-friendly entry into the Civil Registry Portal, offering secure and easy access for all users.
 
Figure 15.	Login and Registration Interfaces of the eRehistroPH Portal



Development


During this phase, the system design served as the primary reference for development. Developers began building the software based on the researchers’ proposed concept and plan, ensuring that the functionalities aligned with the intended objectives of the eRehistroPH system.

Implementation Activities
An implementation plan is a document that outlines the specific processes, resources, and timelines required to achieve a particular goal or objective. It serves as a roadmap that details the necessary actions, assigns responsibilities for each task, and defines the target dates for completion.
 
              Figure 16.	Flowchart of the eRehistroPH

	The flowchart shows the steps in the Certificate Application and Approval Process of the Civil Registry System. It helps plan, visualize, and improve the system. As shown in Figure 16, the process begins when the user registers or logs into the platform to schedule an appointment and select the type of certificate, such as birth, marriage, or death. After completing and submitting the request form, the system checks it for completeness and accuracy. If there are any mistakes, an error message prompts the user to correct them and resubmit the form. Valid applications are saved in the database and sent to the administrator for review. The administrator can approve or reject the request based on the information provided. Once approved, the user must visit the Civil Registry Office for validation. After confirming that the data is correct, the administrator prints and issues the document according to ARTA standards within 3 to 7 working days.

Testing and Evaluation
	
	Testing

Testing was considered one of the most important phases of system development because it ensured that the system was error free, fault free, and vulnerability free, providing high-quality user experience. During this phase the Municipal Civil Registry Office of Sulop, Davao del Sur the newly developed Civil Registry Information System, which functioned as we based through its progressive web app(PWA) design. The software was tested using the ISO 9126 international standard of software quality, which was commonly applied in public service systems. The quality of the system was assessed rigorously in four major areas, including the quality model, external measurements, internal measurements, and quality in use measurements. Through this process, all weaknesses identified during test were addressed to ensure that the system operated effectively and efficiently before its formal release to the public. The characteristics of the system were evaluated for usability, reliability , and functionality testing determined if the system could efficiently and accurately perform its intended operations, such as registering births, deaths, and marriages, and issuing certificates. Reliability testing measured how long the system could operate without crushing, interruptions, data loss, while usability testing assessed how east it was for both the civil registry personnel and the public to use the system. Ensuring the interface promoted productivity and reduced operational delay.


Evaluation
The evaluation phase aimed to assess the overall performace and effectiveness of the developed Civil Registry Systemin improving the management of population records by civil registry officers. This process also identified potential areas for enhancement to further met user needs. The evaluation determined how well the system met the service delivery goals of the Municipal Government of Sulop, Davao del Sur, particularly in terms of efficiency, accessibility, and user satisfaction. Feedback, remarks, and observations were gathered from civil registry officials and citizens who availed themselves of civil registration services. These inputs served as the basis for determining the system’s effectiveness and efficiency, as well as ensuring that it aligned with the municipality’s objectives of providing reliable high quality public service.
	Respondents. Interviews and surveys were included under primary research and served as key tools for collecting firsthand data from individuals directly affected by or involved in the system. These instruments yielded valuable insights that formed part of the assessment of the proposed Civil Registry System. The respondents were chosen on the basis of their role and experience in offering or utilizing civil registry services.
To ensure that the assessment was well-informed, the proponent selected participants who had at least one year of experience in civil registry operations or transactions. The respondents were categorized into three groups of civil registry personnel and service users from the Municipality of Sulop, Davao del Sur. These included one (1) super admin, three (3) civil registry admin personnel, and two (2) clients who had utilized civil registration services like birth, marriage, or death certificates, and four (4) members of Advisory Committee.
These respondents were requested to fill in descriptive survey questionnaires for testing the system in usability, reliability, and accuracy. 
Table 4. Distribution of Respondents
Evaluators	Sample Size
Super Administrator
Staff Administrator
Citizens/Clients
Advisory Committee	1
3
2
4
Total	10

Their responses were collected from these primary groups with the objective of providing a realistic and balanced assessment of the system's operation and identifying any point for adjustment prior to its installation.





	Sampling and Design Technique
Design and sampling technique will referred to the procedures adopted in the study to collect and interpret the data. It involved the task of choosing a representative subset of individuals from a larger population. To ensure that each stratum was represented proportionally and without bias, offering more accurate data, the research used a stratified random sampling technique.

	Evaluation Procedure
The evaluation procedure included the processes that measured the performance, quality, and efficiency of the study. The output of the project assisted the proponent in decision making, the identification of the particular areas to be rectified, and validation of research.
Step 1. Request for Evaluation. The proponent requested permission for evaluation of the system that was created.
Step 2. Permission Letter Presentation. The requested letter of
permission signed by the chairman was granted to the panelists.
Step 3. Orientation of Respondents. The proponent will gave a detailed presentation to the respondents on how to download and utilize the civil registry PWA.
Step 4. Dissemination of Survey Questionnaire Form. The proponent distributed the form composed of questions that evaluated the assessment process to the respondents, who will include the sulop citizens, panelists, and IT professionals.
Step 5. Establish a Timeframe for Data Collection. Three to five days were allocated to the respondents to complete the survey questionnaire.
Step 6. Data Collection. The proponent collected the filled-up questionnaire or rating sheet.
Step 7. Analyze the Data and Apply Findings. Upon collection of data, the proponent analyzed the collected feedback and applied the findings of the study conducted.
Survey Instrument of the Study
A survey instrument was used to gather information or data from individuals or groups comprising a sample through a standardized, structured process. For this research, as part of the evaluation phase, the respondents were requested to measure the performance of the developed Civil Registry System according to its functionality, performance efficiency, usability, compatibility, and security through an adapted questionnaire based on the International Standard Organization's (ISO) Software Quality Model 9126. The instrument was adapted to meet the project's specific aims and circumstances related to civil registration operations in Sulop, Davao del Sur. 
The survey will focus on three key areas: the system's functionality, performance efficiency, usability, compatibility, and security. Each of these was measured using a 5-point Likert scale. The responses for functionality, performance efficiency, usability, compatibility, and security were rated according to following: Strongly Agree, Agree, Neutral, Disagree, and Strongly Disagree. The agreement levels obtained from the answers were analyzed statistically to provide verbal interpretations and to assess the system's quality and overall user satisfaction.
	Likert Scale of Measurement for Functional Suitability, Performance Efficiency, Usability, Compatibility and Security. A Likert scale was used to measure the degree to which the system performs its desired functions. The tool provided a systematic way of measuring the degree of functioning of the product or service. Table 5 presented the Likert scale of measurement for functionality, performance efficiency, usability, compatibility and security, ranging from one (1) to five (5), with five being the highest level of performance and one being the lowest. The associated interpretations of the scores were as follows: 4.51 to 5.00 as " Strongly Agree (SA)", 3.51 to 4.50 as " Agree (A)", 2.51 to 3.50 as " Neutral (N)", 1.51 to 2.50 as " Disagree (D)", and 1.00 to 1.50 as " Strongly Disagree (SD)". This scale provided a useful measure of how well the system is performed against user expectations and enabled specific areas where improvements can be made.

Table 5.  Likert Scale Measurement for Functional Suitability, Performance Efficiency, Reliability, Usability, and Maintainability
Mean Range	Descriptive Equivalent	Interpretation
4.51 – 5.00	Strongly Agree (SA)	This feature described in the item is excellent, showing high reliability and usability with no issues or concerns in the Civil Registry system.
3.51 – 4.50	Agree (A)	This feature described in the item is good, with only minor issues or concerns in the system.
2.51 – 3.50	Fairly Agree (FA)	This feature described in the item is satisfactory, but some notable issues or concerns exist regarding the system.
1.51 – 2.50	Disagree (D)	This feature described in the item has significant issues or concerns affecting the Civil Registry system.
1.00 - 1.50	Strongly Disagree	This feature described in the item has extensive issues or concerns in the system.

	Statistical Tools. A statistical tool was used to analyze and interpret data in a study using mathematical techniques, identifying patterns, relationships, and insights for decision-making or problem-solving. After gathering respondents' feedback, the data were consolidated and tabulated, and the evaluators' responses were summarized and divided by the total number of respondents to get the average. The weighted mean represented the impact of the civil registry system on respondents. The equation  below shows the formula for obtaining the mean value:
X ̅=(∑▒X)⁄n
Where: 
X ̅=Mean
∑▒X=sum of scores
n = total number of respondents
The mean was employed to determine the extent of functionality, Reliability, compatibility, performance efficiency, and security of the Web-based System.

Deployment Activities


The deployment activities were an essential part of implementing the Civil Registry Document Request and Management System. It involved setting up, testing, and deploying the web-based application at the Municipality of Sulop Civil Registry Office. The deployment planning process outlined three main steps to ensure the system’s effectiveness and smooth implementation: first, the installation and configuration of necessary software and hardware components to ensure proper operation; second, the migration and backup of existing civil registry records to maintain data accuracy and security; and lastly, the system monitoring and maintenance, which involved observing system performance, addressing issues, and applying updates when needed.

	Installation Activities
	The installation plan describes the actions and procedures necessary to install and configure specific software, hardware, or systems in the intended environment. The installation steps for the Municipality of Sulop, Davao del Sur, Civil Registry are as follows:
 
         Figure 17.	Buy a Hosting Server and a Subdomain Name

	
As illustrated in Figure 17, the first step is to purchase a web hosting server and create a subdomain name from Hostinger. The hosting server acts as a storage space that contains all the necessary files, allowing users to access the system online, while the subdomain name represents an additional part of a website’s address that appears before the main domain name.
 
          Figure 18.	Adding Subdomain Name to the Website


As illustrated in Figure 18, the second step involves adding a subdomain name for the website. A subdomain serves as a prefix to the main domain name, creating a separate website or a distinct section within it. The researcher obtained the hosting service and subdomain through Davao del Sur State College (DSSC).
As illustrated in Figure 19 below, the third step is setting up the subdomain name. To configure the subdomain, access the Hostinger control panel, locate “Subdomains” under the Domains section, select a preferred subdomain name, enter it in the “Enter Subdomain” field, and click the Create button.
 
          Figure 19.	Set Up the Subdomain Name

 
       Figure 20.	Transfer the Laravel Project File in Hostinger
	
	
As illustrated in Figure 20, the fourth step is to upload the Laravel project files to Hostinger. After preparing the project, access the Hostinger control panel and open the File Manager. From there, upload all the Laravel project files to the designated directory of the chosen subdomain. Once the upload is complete, the Laravel project will run online under the selected subdomain name.
 
                    Figure 21.	 Integrating the database

	
As illustrated in Figure 21, the fifth step involves using the hosting server from Hostinger to connect the database to the system. This connection allows the website to store and manage data efficiently, ensuring smooth and reliable online operation.
 
                     Figure 22.	 Set up web application Settings.


As illustrated in Figure 22, the sixth step involves configuring the web application settings for deployment. The Secure Sockets Layer (SSL) is activated to ensure a secure connection, and the .env file is adjusted to set Laravel in production mode. To enhance performance, minimize loading time, and optimize system efficiency, commands such as route:cache and config:cache are executed.
 
                     Figure 23.	 Check the Web Functionality

As shown in Figure 23, the seventh step is to verify the system functionality through a web browser. This ensures that the system operates correctly on a desktop computer and allows users to confirm that it is easily accessible and fully functional online.

	Maintenance Activities. The maintenance activities comprised a set of steps and schedules designed to ensure the smooth operation of hardware and software systems and to prevent any potential issues or malfunctions.
 
                         Figure 24.	 Editing the Source Code
	
	
	As illustrated in Figure 24, the source code of the eRehistroPH is shown, which is used for performing regular system checks, updates, and configuration changes to ensure that the software and its dependencies are up to date and free from bugs. Furthermore, it monitors system performance and identifies any issues that may affect its efficiency. For maintenance, the developer accessed the project files using Visual Studio Code.
 
                        Figure 25.	 Updating the Project Remotely
As illustrated in Figure 25, the project was updated remotely through the File Manager feature of Hostinger’s hPanel. This tool provides a graphical interface that allows the developer to access, modify, and manage the website files directly from the hosting server. It was used to upload updated files, apply necessary changes, and maintain the overall functionality of the web system. Unlike using PuTTY, which requires command-line operations, the File Manager offers a more user-friendly method for performing maintenance activities.

Backup and Recovery Activities. Backing up and recovering data involved restoring duplicated information to its original location and maintaining a secure backup to ensure that system operations could resume smoothly in the event of a failure, data loss, or corruption.
 
            Figure 26.	 Daily and Weekly Backups on Hostinger
	
		
	As illustrated in Figure 26, Hostinger automatically performs daily and weekly backups of all hosted databases and files. These backups are securely stored on Hostinger’s remote servers and can be restored directly through the hPanel (Hostinger Control Panel) whenever necessary.
 
            Figure 27.	 Upload Project File to GitHub
	
	
	As shown in Figure 27, the entire project was uploaded to a GitHub repository, which serves as a secure remote storage platform where each committed version is automatically saved. This process ensures that all system files can be easily restored from the cloud repository in the event of hardware failure, accidental deletion, or data corruption. 



CHAPTER IV 


RESULT AND DISCUSSION


This chapter presented the result and key insights derived from the capstone project titled “eRehistroPH; Cicil Registry Management System based on ARTA with Data Analytics.” It outlined the findings in relation to the project’s specific objectives, outcomes, and significant discussions. 
Overall, the chapter provided a detailed summary of the analyses and conclusions drawn from the study. The results were anticipated to contribute to the existing body of knowledge on “eRehistroPH; Cicil Registry Management System based on ARTA with Data Analytics” and served as valuable of reference for future researchers.

Super Administrator Module that Manage User Accounts and Roles


This module allowed the Super Admin to manage user accounts and assign roles. It also enabled the Super Admin to add, update, remove accounts, as well as define access privileges to ensure proper system management and security. Figure 28 showed the interface of the Super Admin Module, which was designed to help the Super Admin efficiently manage user accounts and roles. Through this module, the Super Admin could create, update, and delete accounts, as well as assign appropriate access levels to maintain system organization and security.
 
Figure 28.	Graphical user Interface for Super Admin Module that Manage User Accounts and Roles

	The pseudocode in Figure 29 shows how the Super Admin can manage user accounts within the system. It begins by displaying a list of users that includes their name, email, role, status, and available actions. For each user, the Super Admin is given options to edit user information, delete an account, or activate and deactivate user access. When any of these actions are performed, the system automatically updates and refreshes the user list to reflect the latest changes. This function ensures efficient user management and maintains accurate and up-to-date account records. Relevant code snippets for this pseudocode were provided in Appendix 4.1 on page 156.
 
Figure 29.	Pseudocode of the Super Admin User and Role Management



Super Admin Module that provides an overview of request transactions


This module was designed to allow the Super Admin to monitor and review all document requests processed within the system. It displayed a summary of released records, including the list of birth certificates, marriage licenses, death certificates, and marriage certificates. Through this module, the Super Admin could easily track the status of each transaction, ensure the accuracy of records, and maintain transparency in the processing of civil registry documents. Figure 30 showed the Super Admin Module that provided an overview of approved certificates. It allowed the Super Admin to monitor and review all processed document requests, including the list of released birth certificates, marriage licenses, death certificates, and marriage certificates. This feature helped ensure accurate record tracking and promoted transparency in managing civil registry transactions.
 
Figure 30.	Graphical user Interface for Super Admin Module that provides an overview of Approved Certificates


The pseudocode in Figure 31 shows how the Super Admin can manage approved certificates within the system. It begins by displaying the Super Admin Dashboard Menu, which provides access to various sections such as Dashboard, Reports, Approved Certificates, and Manage Users. When the Super Admin selects the “Approved Certificates” option, the system displays different certificate categories, including Birth Certificates, Marriage Licenses, Death Certificates, and Marriage Certificates. The system then retrieves approved certificate data from the database and displays a list of requests, showing details such as the user name, reference number, date requested, date processed, processed by, and an action button to view more information. When the “View” button is clicked, the system opens a detailed view window displaying the complete information of the selected certificate. This function allows the Super Admin to efficiently monitor, review, and manage all approved certificate records in the system. Relevant code snippets for this pseudocode were provided in Appendix 4.2 on page 157.
 
Figure 31.	Pseudocode for Super Admin Module that provides an overview of request transactions

Super Admin Module that Could Oversee the Display of Data Analytics


	Figure 32 showed the Super Admin Module that displayed data analytics for system monitoring and evaluation. This feature allowed the Super Admin to visualize and analyze important information such as the number of certificate requests by type, the monthly transaction trends, the most requested document, and the barangays with the highest number of clients. Through these analytics, the Super Admin could easily track system performance, identify patterns in user activity, and make data-driven decisions to improve the overall efficiency of the Civil Registry Management System.
 
Figure 32.	Graphical user Interface for Super Admin Module that Oversee the Display of Data Analytics

The pseudocode in Figure 33 shows how the Super Admin generates and views certificate reports in the system. It starts by displaying the Dashboard Menu, where selecting “Reports” retrieves certificate data from the database. The system then displays charts and tables such as Certificate Requests by Type, Monthly Transaction Trends, and Most Requested Documents. It also includes Barangay-based analytics showing top clients and the most requested certificates. This function helps the Super Admin monitor trends and evaluate overall certificate transactions efficiently. Relevant code snippets for the Superadmin Data Analytics are provided in Appendix 4.3 on page 158.
 
Figure 33.	Pseudocode for Super Admin Module that Oversee the Display of Data Analytics


Admin Module that Could Process Users’ Documents

The Admin Module that processed users’ documents was designed to handle and manage all submitted requests efficiently. As shown in Figure 34, this feature allowed the Admin to approve or reject users’ appointments based on the validity of their submitted information and requirements. Additionally, it enabled the Admin to manage document requests such as birth, marriage, and death certificates, ensuring that all transactions were properly verified, recorded, and released in an organized and timely manner.
 
Figure 34.	Graphical User Interface for Admin Module that Process Users’ Documents and Appointments



	The pseudocode in Figure 35 shows how the Admin Module GUI handles users' document and appointment requests. It starts by showing a list of appointments that includes the client's name, request type, date, and status. The administrator can view, approve, or reject each request. If they select "View," detailed information opens for verification. Choosing "Approve" updates the record, notifies the user, and logs the action. If "Reject" is chosen, the system asks for a reason, updates the status, sends a notification, and records the activity. This function provides a clear interface that makes request processing easier, keeps records accurate, and supports good communication between administrators and users. Relevant code snippets for this pseudocode were provided in Appendix 4.4 on page 159.
 
Figure 35.	Pseudocode for Admin Module that Process Users’ Documents and Appointments



Admin Module that Generates Document Reports


This feature enabled the Admin Module to generate reports for birth certificates, marriage certificates, death certificates, and marriage licenses. This feature helps monitor the number of requests, their current status (pending, approved, or rejected), and the overall completion rates. Figure 36 presented the export options such as Export PDF and Export Excel, enabling administrators to easily download and save reports in different formats. The Export PDF option is ideal for printing or sharing official reports, while the Export Excel option allows for further data analysis and record organization. These export tools ensure that all civil registry data is easily accessible, well-documented, and ready for presentation or archiving.
 
Figure 36.	Graphical User Interface for Admin Module that Generates Document Reports

	
	The pseudocode in Figure 37 shows how the Civil Registry Analytics Dashboard function operates to organize, visualize, and export registry data. It begins by retrieving certificate information from the database and displaying it in a detailed report showing total requests, pending, approved, and rejected applications along with their completion rates. The system then generates a donut chart to show the top requested certificate types and a bar chart displaying the attendance rate of the top ten barangays. A corresponding statistics table lists each barangay’s rank, total transactions, and percentage rate for clearer data comparison. Finally, the dashboard includes export options such as PDF, Excel, and CSV, allowing administrators to generate and download summarized analytics for reporting. This function provides an efficient and data-driven tool for monitoring registry performance and supporting decision-making within the Civil Registry System. Relevant code snippets for this pseudocode were provided in Appendix 4.5 on page 159.
 
Figure 37.	Pseudocode for Admin Module that Generates Document Reports



Admin Module that Tracks Transaction Logs for Civil Registry Services


This feature lets the administrator monitor and keep a record of all transactions related to civil registry services. This includes requests for birth certificates, marriage certificates, death certificates, and marriage licenses. The system automatically logs every activity, such as submitting a request, approving or rejecting it, and making updates. This creates a clear and traceable record of both user and system actions. It helps maintain accuracy, accountability, and smooth tracking of document processing. 
Figure 38 shows the transaction history page in the Admin Module. This page allows administrators to view and track all certificate requests in the system. Each transaction includes important details like the requester’s name, email, reference number, date of request, and current status (pending, approved, or rejected). The module also provides quick buttons to view more details or print the transaction record. This feature helps administrators manage requests efficiently while keeping tracking of all civil registry activities organized and transparent.
 
Figure 38.	Graphical User Interface for Admin Module that Tracks Transaction Logs for Civil Registry Services
	
The pseudocode in Figure 39 shows how the Admin Transaction History Module handles certificate transactions in the Civil Registry System. It starts by showing the transaction interface with tabs for Birth, Marriage, Death, and Marriage License certificates. When a tab is selected, the system filters and displays only the relevant records. Each transaction includes the requester’s name, email, reference number, date, and status. The status is marked with color-coded badges for pending, approved, or rejected requests. The administrator can view details or create printable reports. All actions are recorded in the audit trail to ensure transparency and accountability. Relevant code snippets for this pseudocode were provided in Appendix 4.6 on page 160.
 
Figure 39.	Pseudocode for Admin Module that Tracks Transaction Logs for Civil Registry Services



Admin Module that Generates Periodic Data Analytics Reports

This feature allows the administrator to view automatically genarated regular data reports about civil registry operations. As shown in Figure 40, the dashboard displays summarized and visual data, including the total number of birth, marriage, and death registrations, the most requested certificate types, and attendance rates by barangay. These insights give administrators real-time information to track trends, assess performance, and make informed choices to improve registry operations. Additionally, this dashboard supports transparency and accountability by showing current statistics that reflect the effectiveness of civil registry services.
 
Figure 40.	Graphical User Interface for Admin Module that Generates Periodic Data Analytics Reports
	

	Figure 41 shows the pseudocode for the Registry Analytics Report process. This function collects and processes data from the database, including birth, marriage, and death records, along with barangay attendance information. The system calculates the total and percentage of each certificate type. It also determines the attendance rates of various barangays and identifies the top ten barangays with the highest attendance performance. After processing, the system generates visual analytics. These include a trend graph of registration activities, a pie chart of the most requested certificates, and a bar graph of barangay attendance rates. These charts and summaries appear on the administrator dashboard in real time and update regularly to keep data accurate. This reporting feature helps administrators monitor performance and make informed decisions efficiently. Relevant code snippets for this pseudocode were provided in Appendix 4.7 on page 160.
 
Figure 41.	Pseudocode for Admin Module that Generates Periodic Data Analytics Reports



Admin Module that Searches User Data and Related Information


Figure 42 showed the Admin Module that Searches User Data and Related Information, which enables the administrator to efficiently locate and view specific user details within the system. Through this feature, the admin can search and access information such as the User Profile, Household Groupings, and Relationship to Head. This functionality helps maintain organized records and ensures that all data related to a user or family is easily retrievable for verification, reporting, and documentation purposes. It enhances data management accuracy and supports faster processing of civil registry-related transactions.
 
Figure 42.	Graphical User Interface for Admin Module that Searches User Data and Related Information
	
Figure 42 shows the Admin Module for Civil Registry Encoding Management. This allows the administrator to view and manage civil registry records. Through this feature, the admin can search for and access information like registry numbers, household groupings, relationships to the head, and personal details of individuals. The module also lets users add new records or import data to speed up processing. This function helps keep records organized and accurate, supporting efficient verification and documentation in the civil registry system. Relevant code snippets for this pseudocode were provided in Appendix 4.8 on page 161.
 
Figure 43.	Pseudocode for Admin Module that Searches User Data and Related Information



Admin Module that Displays Received Feedback from Users


Figure 44 shows the feature that allows the administrator to view and manage feedback submitted by users, which is an essential component of compliance with the Anti-Red Tape Authority (ARTA) guidelines. It provides a platform for citizens to share their experiences, comments, and suggestions regarding the civil registry services they received. Through this feedback mechanism, the system helps administrators assess service quality, identify areas for improvement, and ensure transparency and accountability in public service delivery.
 
Figure 44.	Graphical User Interface for Admin Module that Displays Received Feedback from Users


Figure 43 illustrates the User Feedback Management Function, which enables the administrator to access, arrange, and assess user feedback within the system. This module allows the admin to search and filter feedback by rating, date, or client type, facilitating effective review and monitoring of user experiences. The system also showcases summary metrics such as the total number of feedback entries, the average rating, and the latest submissions. Each feedback entry includes information like language, region, service utilized, and comments given by the user. Furthermore, the “Mark All Read” feature aids the admin in efficiently handling unread feedback. This function promotes ongoing service enhancement by offering insights into user satisfaction and highlighting areas that require attention. Relevant code snippets for this pseudocode were provided in Appendix 4.9 on page 161.
 
Figure 45.	Pseudocode for Admin Module that Displays Received Feedback from Users



Admin Module that Generates and Prints User-Filled Forms


Figure 46 shows the Admin Module that Generates and Prints User-Filled Forms, which allows the administrator to view, generate, and print documents or forms that have been completed by users. This feature ensures that all user-submitted information is properly documented and can be easily retrieved in hard copy when needed. It also supports the efficient processing of civil registry documents by providing quick access to printable versions, helping maintain organized records and ensuring compliance with documentation requirements.
 
Figure 46.	Graphical User Interface for Admin Module that Generates and Prints User-Filled Forms

	Figure 46 shows the Form Generation and Printing Function. This feature allows the administrator to view, create, and print user-filled documents like certificates of live birth. When a record is chosen, the system pulls the related user data and fills it into the correct document template. The completed form can then be previewed and printed straight from the system interface. This function makes sure that user-submitted information is formatted correctly, helping administrators produce official records quickly and accurately. It supports effective processing, organized record management, and meets civil registry documentation standards. Relevant code snippets for this pseudocode were provided in Appendix 4.10 on page 162.
 
Figure 47.	Pseudocode for Admin Module that Generates and Prints User-Filled Forms



User Module that Allows Users to Book an Appointment


Figure 48 shows the User Module that Allows Users to Book an Appointment, which enables users to conveniently schedule their appointments online for various civil registry services such as birth, marriage, and death certificates. This feature ensures an organized and systematic process, reducing long queues and walk-in congestion. It also helps administrators manage and monitor appointments efficiently by providing real-time updates on scheduled, approved, or pending requests.

 
Figure 48.	Graphical User Interface for User Module that Allows Users to Book an Appointment


 Figure 49 shows the Appointment Scheduling Function. This feature allows users to set up an appointment using an online calendar. The system displays a monthly calendar and marks each date based on slot availability, such as AM, PM, nearly full, or fully booked. These markers help users quickly find days that have open time slots. When a user clicks on a date with available times, the system shows the options for that date. If the date is fully booked, the system informs the user. After the user selects a date and time, the system records the appointment in the database and updates the calendar to show the new availability. This feature simplifies the scheduling process, reduces walk-ins, and speeds up service transactions. It also helps administrators by giving them updated information about upcoming appointments. Relevant code snippets for this pseudocode were provided in Appendix 4.11 on page 162.
 
Figure 49.	Pseudocode for User Module that Allows Users to Book an Appointment



User Module that Displays Processing Time for Each Type of Civil Registry Transaction


Figure 50 shows the User Module that Displays Processing Time for Each Type of Civil Registry Transaction. This feature provides users with clear and transparent information on how long it takes to process different civil registry documents, such as birth certificates, marriage licenses, and death certificates. By displaying the estimated processing duration, the system helps users plan their appointments accordingly and aligns with the ARTA standards for processing timelines—3 days for simple transactions, 7 days for complex transactions, and 20 days for highly technical transactions. This promotes efficiency, transparency, and accountability in public service delivery.
 
Figure 50.	Graphical User Interface for User Module that Displays Processing Time for Each Type of Civil Registry Transaction


Figure 51 shows the User Module for Selecting Certificate Type. This feature allows users to choose the civil registry document they need, such as a birth certificate, death certificate, marriage certificate, or marriage license. Each option clearly displays important details, including processing time, fees, requirements, and ARTA-mandated timelines. By presenting this information upfront, the system helps users understand what documents they need to prepare and how long the transaction may take. It also guides them in selecting the right service before proceeding with the appointment booking process. This feature improves service delivery by reducing user confusion, preventing incorrect requests, and ensuring compliance with set processing times. Relevant code snippets for this pseudocode were provided in Appendix 4.12 on page 163.
 
Figure 51.	Pseudocode for User Module that Displays Processing Time for Each Type of Civil Registry Transaction



User Module that Receives Status Updates for Appointment Approval


Figure 52 shows the User Module that Receives Status Updates for Appointment Approval. This feature allows users to be promptly informed about the status of their appointment requests—whether they have been approved, rejected, or are still pending. It helps users track their application progress efficiently without the need to visit the civil registry office personally. This function enhances transparency, reduces uncertainty, and aligns with ARTA’s goal of providing faster and more efficient public service transactions.
 
Figure 52.	Graphical User Interface for User Module that Receives Status Updates for Appointment Approval


Figure 53 illustrates the User Module that Provides Notification Updates for Civil Registry Requests. This functionality enables users to get real-time information about the status of their submitted requests, such as applications for birth certificates or bookings for appointments. Notifications contain specifics like whether a request has been submitted, approved, or denied, along with reference numbers for straightforward tracking. By offering prompt alerts, the system aids users in staying informed without the need to visit the civil registry office or make follow-up calls. This feature enhances transparency, keeps users updated throughout the process, and aligns with ARTA’s objective of facilitating quicker and more efficient public service transactions. Relevant code snippets for this pseudocode were provided in Appendix 4.13 on page 163.
 
Figure 53.	Pseudocode for User Module that Receives Status Updates for Appointment Approval



User Module that Provides a Feedback Submission Feature


Figure 54 showed the User Module that provided a feedback submission feature. This module enabled users to submit feedback regarding the services or transactions they experienced. Users accessed the feedback form, entered their comments or suggestions, and submitted them through the system. Upon submission, the feedback was recorded in the database, and the system could notify the concerned personnel for proper action. A confirmation message was also displayed to inform users that their feedback had been successfully received. This feature contributed to improving service delivery by allowing administrators to review user inputs and address concerns, thereby promoting transparency and accountability in the system.
 
Figure 54.	Graphical User Interface for User Module that Provides a Feedback Submission Feature


Figure 55 shows the User Module for the Service Satisfaction Survey. This feature lets users rate their experience with civil registry services by answering several questions. Each question uses a 1 to 5 rating scale, and users can also add optional comments if they want to share more details. The system displays all questions and waits for the user to complete the survey. When the user submits their answers, the system checks the responses, saves them to the database, and sends the feedback to the relevant staff for review. A confirmation message is then shown to inform the user that their survey was successfully submitted. This feature helps improve service delivery by providing users an easy way to share their experience. It supports transparency and helps administrators identify areas that may need attention or improvement. Relevant code snippets for this pseudocode were provided in Appendix 4.14 on page 164.
 
Figure 55.	Pseudocode for User Module that Provides a Feedback Submission Feature



User Module that Displays Online Form Submission Outcome for Civil Registry Documents


Figure 56 showed the User Module that displayed the outcome after users filled out online forms for civil registry documents. This module allowed users to view the status of the forms they had filled out, indicating whether the request was approved, pending, or required additional information. After filling out and submitting the online form, users could access their accounts to check the outcome, which enabled them to track the progress of their application without visiting the office. This feature improved transparency and efficiency by keeping users informed and reducing unnecessary follow-ups.
 
Figure 56.	Graphical User Interface for User Module that Displays Online Form Submission Outcome for Civil Registry Documents 


Figure 57 shows the User Module that displays the results of submitted online forms for various civil registry documents. These documents include birth certificates, marriage certificates, death certificates, and license applications. After submitting any of these forms, users can access this module to view the completed document and check its current status. The system retrieves the correct form based on the user's submission and indicates whether the request is approved, pending, or requires more information. If additional details are needed, the system provides instructions on what the user should submit. This feature allows users to track their applications without visiting the civil registry office. It speeds up processing, keeps users updated, and lowers the need for repeated follow-ups. Relevant code snippets for this pseudocode were provided in Appendix 4.15 on page 164.
 
Figure 57.	Pseudocode for User Module that Displays Online Form Submission Outcome for Civil Registry Documents



Evaluation Ratings from the Respondents in terms of Functional
Suitability


The evaluation ratings from the respondents in terms of Functional Suitability show how well the system performs its intended tasks. This part measures if the system works as expected, provides correct results, and meets the needs of its users. The feedback from the respondents helps identify the parts of the system that work properly and those that may need improvement to make the system perform better. This evaluation also helps determine the system’s completeness and reliability in carrying out its functions. As of 2025, the evaluation ratings for the Super Administrator Module are shown in Table 6, the ratings for the Administrator Module are presented in Table 7, and the results for the User or Citizen Page are displayed in Table 8. Together, these ratings give a clear view of how each group of respondents assessed the system’s overall functional performance.
As presented in Table 6, the evaluation ratings from the respondents, which included Super Admin and Advisory Committee members, regarding the functional suitability of the Super Admin module, obtained a consolidated mean rating of 4.14, interpreted as “Agree.” This indicates that respondents generally found the Super Admin module to be satisfactory in managing administrative operations, although there is room for improvement.
Among the features evaluated, the highest-rated functionalities were managing user roles and user accounts, which received mean ratings of 4.80 and 4.6 respectively, interpreted as “Strongly Agree.” These results demonstrate that the system effectively supports key administrative tasks, ensuring proper management of users and their access rights. Similarly, the system’s capability to display data analytics of certificate requests by type also received a high mean rating of 4.60, reflecting its usefulness in monitoring system activities and generating relevant reports.
On the other hand, features related to displaying requests transactions for birth certificates, marriage licenses, death certificates, and marriage certificates received relatively lower mean ratings ranging from 3.60 to 3.80, interpreted as “Agree.” Additionally, the data analytics features for monthly transaction trends, most requested documents, and highest clients in each barangay obtained mean ratings between 4.00 and 4.20. These lower ratings suggest potential areas for enhancement, particularly in the accuracy, clarity, and comprehensiveness of transaction displays and data visualizations. As emphasized by Kyamko, M. (2025), Customer expectations are often tough to meet. You must continue to learn various strategies to keep matching these expectations.
Table 6.	Evaluation Ratings from the Respondents (Super Administrator, and Advisory Committee) in terms of Functional Suitability for the Super Administrator Module.
Particulars	Mean	Verbal Interpretation
The system effectively managed user accounts.	4.60	STRONGLY AGREE
The system effectively managed user roles.	4.80	STRONGLY AGREE
The system accurately displays requests transactions of list of birth certificate released.	3.80	AGREE
The system accurately displays requests transactions of list of marriage license released.	3.80	AGREE
The system accurately displays requests transactions of list of death certificate released.	3.60	AGREE
The system accurately displays requests transactions of list of marriage certificate released.	3.80	AGREE
The system accurately displays data analytics of certificate request by type.	4.60	STRONGLY AGREE
The system accurately displays data analytics of monthly transaction trend.	4.20	AGREE
The system accurately displays data analytics of most request document.	4.20	AGREE
The system accurately displays data analytics of highest clients in each Baranggay.	4.00	AGREE
Consolidated Mean	4.14	AGREE


Overall, the results indicate that the Super Admin module performs its intended functions effectively, particularly in user and role management. Nevertheless, improvements in transaction reporting and visual analytics are recommended to enhance system reliability and overall user satisfaction. These findings are consistent with the study of Lee et al. (2006), who argued that continuous improvement in system features and user satisfaction is essential for ensuring the effectiveness and usability of information systems.
As shown in Table 7, the evaluation ratings from the respondents regarding the functional suitability of the Administrator Module achieved an overall high rating, with several features interpreted as “Strongly Agree” or “Agree.” This indicates that the module effectively performs its intended administrative functions, enabling administrators to process user documents, manage requests, generate reports, and track transaction logs efficiently. The feature that facilitates the approval or rejection of user appointments received the highest mean rating of 4.85, characterized as “Strongly Agree,” suggesting that this functionality is highly reliable and effective in supporting core administrative operations. Similarly, managing document requests obtained a mean rating of 4.71 (Strongly Agree), demonstrating that the system efficiently handles user submissions and ensures proper workflow management. On the other hand, report generation for marriage licenses, death certificates, and marriage certificates, as well as transaction log tracking for all document types, received slightly lower ratings ranging from 4.42 to 4.47 (Agree). This suggests that while these features are considered accurate and dependable, their functionality may still benefit from further enhancement to improve completeness and precision. 
These findings align with the study of Kalankesh et al. (2020), which emphasized that user satisfaction is strongly influenced by system functionality, responsiveness, and accuracy. High-performing features, such as appointment management and document processing, reflect the importance of maintaining these core functionalities to ensure user trust and operational efficiency. Additionally, the results are supported by Varma (2018), who highlighted that continuous system evaluation and improvements in reporting and data analytics are crucial for sustaining efficiency, reliability, and overall satisfaction in information systems. In the context of the Administrator Module, this suggests that targeted enhancements to report generation and transaction tracking could further optimize system performance.
Table 7.	Evaluation Ratings from the Respondents (Administrator, and Advisory Committee) in terms of Functional Suitability for the Administrator Module.
Particulars	Mean	Verbal Interpretation
The system effectively allows to process user documents by approving or rejecting user appointments.	4.85	STRONGLY AGREE
The system effectively allows to process user documents by managing document requests.	4.71	STRONGLY AGREE
The system accurately generates reports of birth certificate.	4.57	STRONGLY AGREE
The system accurately generates reports of marriage license.	4.47	AGREE
The system accurately generates reports of death certificate.	4.42	AGREE
The system accurately generates reports of marriage certificate.	4.42	AGREE
The system effectively tracks transaction logs of request for birth certificate.	4.42	AGREE
The system effectively tracks transaction logs of request for marriage license.	4.42	AGREE
The system effectively tracks transaction logs of request for death certificate.	4.42	AGREE
The system effectively tracks transaction logs of request for marriage certificate.	4.42	AGREE
The system accurately generates periodic reports of number of Birth, death, and marriage registration.	4.71	STRONGLY AGREE
The system accurately generates periodic reports of top requested certificate types.	4.71	STRONGLY AGREE
The system accurately generates periodic reports of user appointment attendance rate.	4.57	STRONGLY AGREE
The system efficiently searches user related information by user profile.	4.57	STRONGLY AGREE
The system efficiently searches user related information by household groupings.	4.42	AGREE
The system efficiently searches user related information by relationship to head.	4.71	STRONGLY AGREE
The system effectively displays receive feedback from user.	4.71	STRONGLY AGREE
The system accurately generates and prints user-filled forms.	4.14	AGREE
Consolidated Mean	4.54	STRONGLY AGREE


As shown in Table 8, the evaluation ratings from the respondents, which included users or citizens and members of the Advisory Committee, revealed that the User/Citizen Module achieved a consolidated mean rating of 4.64, interpreted as “Strongly Agree.” This indicates that the module effectively fulfills its intended functions, providing users with a seamless and reliable experience in performing various civil registry transactions. Among the evaluated features, the system’s ability to book appointments, provide status updates for appointment approval, allow users to submit feedback, and facilitate the completion of online forms all received a mean rating of 4.67, interpreted as “Strongly Agree.” These findings suggest that the system’s core functionalities operate efficiently and are highly responsive to user needs, promoting user satisfaction and accessibility. Meanwhile, the feature that displays the processing time for each type of civil registry transaction also received a strong rating of 4.50, indicating that the system presents accurate and useful information that helps users manage their time and expectations. Overall, the results demonstrate that the User/Citizen Module is highly functional, user-friendly, and dependable, successfully supporting users in completing online civil registry transactions with accuracy, convenience, and efficiency.
These findings are consistent with Kalankesh et al. (2020b), who emphasized that system functionality, responsiveness, and accuracy are critical determinants of user satisfaction in information systems. Additionally, the results align with Laumer et al. (2017), who highlighted that usability, efficiency, and the clarity of system information are essential factors in achieving high user satisfaction and effective system adoption.

Table 8.	Evaluation Ratings from the Respondents (User/Citizen, and Advisory Committee) in terms of Functional Suitability for the User/Citizen Module.
Particulars	Mean	Verbal Interpretation
The system efficiently booked an appointment.	4.67	STRONGLY AGREE
The system accurately displays the processing time for each type of civil registry transaction.	4.50	STRONGLY AGREE
The system effectively provides status updates for appointment approval.	4.67	STRONGLY AGREE
The system effectively allows users to submit feedback.	4.67	STRONGLY AGREE
The system efficiently allows users to fill out online forms for civil registry documents.	4.67	STRONGLY AGREE
Consolidated Mean	4.64	STRONGLY AGREE


Descriptive Ratings of the Summary of Functionalities


Table 9 presents the summary of the descriptive evaluation of the system’s functional suitability, derived from the assessments of respondents, including the Super Administrator, Administrator, User/Citizen, and members of the Advisory Committee. The User/Citizen functionality obtained the highest mean rating of 4.64, interpreted as “Strongly Agree”, indicating that the module effectively fulfills its intended purpose by allowing users to conveniently perform civil registry transactions, such as booking appointments, filling out online forms, and receiving status updates. Likewise, the Administrator functionality received a mean rating of 4.54, also interpreted as “Strongly Agree,” signifying that administrative operations—such as processing user requests, managing document approvals, and generating reports—are efficiently executed and highly reliable. Meanwhile, the Super Administrator functionality acquired a mean rating of 4.14, interpreted as “Agree,” implying that while the module effectively performs its core functions in managing user accounts and overseeing administrative activities, there remains room for enhancement to further improve overall system control and optimization. The overall mean rating of 4.44, interpreted as “Agree,” indicates that the entire Civil Registry System effectively performs its intended functions across all user levels, ensuring smooth coordination among different modules and supporting efficient digital management of civil registry transactions.
These findings align with the study of Al-Dwairi and Jditawi (2022), which emphasized that the adoption of web-based information systems in government services significantly enhances operational efficiency, data accessibility, and service transparency. Similarly, Al-Mamary and Alshallaqi (2023) highlighted that integrating automated digital systems into public service institutions leads to improved process accuracy, user satisfaction, and organizational productivity. Thus, the results of the Civil Registry System evaluation demonstrate that implementing a multi-module digital platform effectively supports administrative modernization, promotes accuracy in document processing, and enhances the overall quality of public service delivery.
Table 9.	Descriptive Rating of the Summary of Functionalities
Particulars	Mean	Descriptive Equivalence
Super Administrator Functionality	4.14	AGREE
Administrator Functionality	4.54	STRONGLY AGREE
User/Citizen Functionality	4.64	STRONGLY AGREE
OVERALL MEAN	4.44	AGREE


Summary of User Rating based on ISO 25010 Software Quality Framework in terms of Functional Suitability, Performance Efficiency, Usability, Compatibility and Security
 

The summary of user ratings based on the ISO 25010 Software Quality Framework presents how respondents evaluated the overall quality of the system according to internationally recognized software quality standards. The assessment encompasses key quality characteristics, namely functional suitability, performance efficiency, usability, compatibility, and security. Findings indicate that the system effectively performs its intended functions, operates with responsiveness and speed, and maintains stability during various transactions. Moreover, the system ensures ease of maintenance and updates, provides compatibility across multiple platforms and devices, and delivers a user-friendly interface accessible to a wide range of users. Overall, the results demonstrate that the system exhibits a high level of quality in accordance with the ISO 25010 framework, successfully meeting user expectations and operational objectives while identifying certain aspects that may still be refined to further enhance performance and user satisfaction.
As presented in Table 10, the summary of user ratings based on the ISO 25010 Software Quality Framework shows that the system performed exceptionally well across all evaluated quality characteristics. Functional suitability received a mean rating of 4.44, interpreted as “Agree,” indicating that the system effectively performs its intended tasks. Performance efficiency, usability, compatibility, and security received mean ratings ranging from 4.63 to 4.77, all interpreted as “Strongly Agree,” reflecting the system’s responsiveness, user-friendliness, cross-platform functionality, and robustness in protecting user data. The overall mean rating of 4.65, interpreted as “Strongly Agree,” demonstrates that users are highly satisfied with the system’s overall quality, reliability, and effectiveness in supporting civil registry operations.
Specifically, Performance Efficiency ensures that the system responds promptly to user actions, generates reports efficiently even with large datasets, accommodates multiple users simultaneously, and optimizes server resources for stability. Usability shows that the interface is intuitive, provides clear guidance, and delivers feedback after actions, ensuring smooth navigation for all users. Compatibility confirms that the system operates consistently across different devices and browsers while maintaining data integrity and supporting coordination among user roles. Finally, Security demonstrates that strong authentication, restricted access, secure record management, and activity logging protect sensitive data and maintain system accountability.
These findings align with Kapo et al. (2021), who showed that system effectiveness, usability, and performance strongly influence user satisfaction in information systems. Furthermore, the results are supported by Kruger et al. (2020), who highlighted that usability, responsiveness, and system stability are essential factors for enhancing user trust and engagement. Together, these studies confirm that achieving high quality across functional suitability, performance efficiency, usability, compatibility, and security is critical for system acceptance, efficiency, and sustained user satisfaction.
Table 10.	Summary of User Rating based on ISO 25010 Software Quality Framework
Quality Characteristic	Mean	Descriptive Equivalent
Functional Suitability	4.44	AGREE
Performance Efficiency	4.63	STRONGLY AGREE
Usability	4.77	STRONGLY AGREE
Compatibility	4.72	STRONGLY AGREE
Security	4.67	STRONGLY AGREE
OVERALL MEAN	4.65	STRONGLY AGREE
 


CHAPTER V


SUMMARY, CONCLUSION, AND RECOMMENDATION

 
This chapter provided a comprehensive examination of the study’s results, important conclusions, and suggestions for further research and area advancement. The study’s conclusions and applicability were outlined, offering useful information to people or organizations with an interest in the topic. By analyzing the study’s overall efficacy and limitations, it presented a comprehensible summary of its relevance. 
The recommendation section offered insightful suggestions for additional research, development, and implementation. These suggestions were useful to future researchers who aimed to build on this study or used it as a guide for their own investigations.

Summary

The eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics was developed to enhance the management, organization, and processing of civil registry records, including birth, marriage, and death certificates within the Municipality of Sulop, Davao del Sur. Key features of the Super Admin module included managing user accounts and roles, monitoring transactions, and generating analytical reports, while the Admin module focused on processing document requests, approving or rejecting appointments, and generating civil registry reports. The User module enabled clients to book appointments, complete online forms, receive notifications, and submit feedback. Using the ISO/IEC 25010 Software Quality Framework, the system’s evaluation demonstrated excellent performance across various quality attributes, including performance efficiency, usability, functional suitability, compatibility, and security, all of which received high ratings from respondents. 
Feedback from the Advisory Committee, administrators, and users indicated that the system successfully met its operational and functional objectives by improving efficiency, accuracy, and transparency in civil registry services. However, feedback also suggested further enhancement in report generation speed and interface responsiveness to maximize system efficiency. Overall, eRehistroPH successfully streamlined civil registry operations and supported more efficient public service delivery through digital innovation.



Conclusion


The eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics was created to resolve the inefficiencies and challenges encountered in the manual processing of civil registry transactions at the Civil Registry Office of Sulop, Davao del Sur. The system streamlined the civil registration process by reducing human errors, minimizing processing delays, and ensuring accurate and secure record handling. It employed a web-based platform to deliver a more efficient, transparent, and accessible service for both citizens and civil registry staff.
From the findings of the study, the following conclusions were formulated:
	The Super Administrator module obtained a consolidated mean rating of 4.14, interpreted as “Agree.” This indicates that respondents generally found the module satisfactory in managing administrative tasks. The module was particularly effective in managing user accounts (mean = 4.60, “Strongly Agree”) and user roles (mean = 4.80, “Strongly Agree”), demonstrating its reliability in supporting administrative control. However, some features related to the accurate display of request transactions for civil registry documents (birth, marriage, and death certificates) received slightly lower ratings (3.60–3.80, “Agree”), suggesting a minor scope for improvement in data presentation and accessibility.
	The Administrator module achieved a consolidated mean of 4.54, interpreted as “Strongly Agree.” Respondents highly rated its capability to process user documents, approve or reject appointments, generate reports, and track transaction logs efficiently. Features such as approving or rejecting user appointments (mean = 4.85) and generating periodic reports on registration and user activity (mean = 4.71) were particularly praised. These results indicate that the Administrator module effectively supports administrative operations, ensuring accurate record management and streamlined workflow.
	The User/Citizen module received a consolidated mean rating of 4.64, interpreted as “Strongly Agree.” Users reported high satisfaction with the module’s functionalities, including booking appointments, tracking transaction processing time, submitting feedback, and completing online forms. This reflects the system’s user-friendliness and effectiveness in facilitating citizen engagement with civil registry services.
	The system achieved an overall mean of 4.44, interpreted as “Agree,” indicating general satisfaction with the system’s functional suitability. According to the ISO 25010 software quality framework (Table 18), the system also performed exceptionally well in other quality characteristics, including performance efficiency (4.63), usability (4.77), compatibility (4.72), and security (4.67), with an overall mean of 4.65 (“Strongly Agree”). This demonstrates that the system not only meets functional requirements but also provides a reliable, secure, and user-friendly experience.
The findings suggest that the civil registry management system successfully fulfills its intended purpose. It efficiently supports the tasks of Super Administrators, Administrators, and Users/Citizens by providing accurate, accessible, and user-friendly features. While minor improvements can be made in the display of some transactional data within the Super Administrator module, the overall system is considered effective, reliable, and aligned with the study objectives.

Recommendation

The following recommendations were proposed to further enhance the eRehistroPH: Civil Registry Management System Based on ARTA with Data Analytics, based on the feedback and comments gathered during the system evaluation:
	The login and logout session should be designed so that once a user logs out, the system automatically returns to the login page to ensure security.
	All login and logout activities should be recorded with a timestamp to ensure accurate tracking and system security.
	The design and functionality of the edit, inactive, and delete features should be consistent throughout the system to maintain a uniform user experience and interface clarity.
	The delete function should include a recycle bin feature to allow recovery of accidentally deleted records and to enhance data security and integrity.
	Change the tao records to Registry Records.
	The print layout and format for all documents should be corrected and standardized to ensure accurate and properly formatted printing across all modules.
	A feature for counting families based on household numbers should be added to improve demographic tracking and data accuracy.
	During the appointment process, all required document fields should be made mandatory to ensure that users provide complete and necessary information before submission.
	Add multi-factor authentication for additional settings.
	 A print button should be added to allow the ARTA reports or feedback to be exported as PDF or Excel files, and the users’ identities should remain anonymous to protect their privacy.
	 In the appointment module, a section should be added to display the required documents, and the processing of on-time and late document submissions should be separated to ensure organized and efficient handling of appointments.
	 The system should include municipality-wide analytics, not limited only to Sulop, to enable broader data comparison and performance evaluation across different municipalities.
The recommendations aimed to enhance the eRehistroPH system. By implementing these improvements, the super admin, administrators, and users would experience a more seamless and reliable system with improved functional suitability, performance efficiency, compatibility, usability, reliability, and security, ensuring greater accuracy, accessibility, and efficiency in managing civil registry records and transactions.



























REFERENCES


Adair, T., Badr, A., Mikkelsen, L., Hooper, J., & Lopez, A. (2023). Global analysis of birth statistics from civil registration and vital statistics systems. Bulletin of the World Health Organization, 101(12), 768–776. https://doi.org/10.2471/blt.22.289035
Alvi, Z., Qureshi, A. A., Danish, W., & Munir, L. (2025). Establishment of a centralized civil registration and vital statistics (CRVS) database in Pakistan: A healthcare perspective. Discover Public Health, 22, 315. https://doi.org/10.1186/s12982-025-00705-4
Al-Dwairi, R. N., & Jditawi, W. (2022). The role of Cloud Computing on the Governmental units Performance and EParticipation (Empirical Study). International Journal of Advances in Soft Computing and Its Applications, 14(3), 79–93. https://doi.org/10.15849/ijasca.221128.06
Al-Mamary, Y. H., & Alshallaqi, M. (2023). Making Digital Government more inclusive: An Integrated perspective. Social Sciences, 12(10), 557. https://doi.org/10.3390/socsci12100557
Brogan, J., & Hugh, M. (2025, January 15). Government | Definition, history, & facts. Encyclopedia Britannica. https://www.britannica.com/topic/government 
Carreon, A. (2024). Service quality and client satisfaction in Calamba City civil registry. Journal of Interdisciplinary Perspectives, 2(8), 99-113. https://doi.org/10.69569/jip.2024.0272 
Creswell, J. W., & Creswell, J. D. (2018). Research design: Qualitative, quantitative, and mixed methods approaches (5th ed.). SAGE Publications.https://spada.uns.ac.id/pluginfile.php/510378/mod_resource/content/1/creswell.pdf
De Guzman, E., & Tamayo, M. R. (2024). Effectiveness of the Civil Registration Services in One Philippine Component City: Basis for Action Plan. CIVIL REGISTRY, 12(2), 162–172. https://doi.org/10.70979/zqre5242
Devi, S. D., Madani, M., Mustari, N., & Fatmawati, F. (2024b). Online-Based Public Service Innovation at the Makassar City Civil Registry Office. Journal of Public Representative and Society Provision, 4(2), 40–52. https://doi.org/10.55885/jprsp.v4i2.504
Ervural, B. C. (2024). A Literature Review of Data Analytics: Tabular and Graphical analysis. Lecture Notes in Networks and Systems, 11–22. https://doi.org/10.1007/978-3-031-70935-7_2
Febrizal, R., Harmiati, N., & Purnawan, H. (2023). QUALITY OF POPULATION ADMINISTRATION AND CIVIL REGISTRATION SERVICES AT THE OFFICE OF THE POPULATION AND CIVIL REGISTRATION OFFICE SOUTH BENGKULU. Indonesian Journal of Social Sciences, Policy and Politics., 1(3), 42–50. https://doi.org/10.69745/ijsspp.v1i3.44
Hasan, M., Kabir, R., Islam, M. S., Uddin, M. N., & Bhadra, R. K. (2022). Digital notification approach to improve birth and death registration in Bangladesh: A pilot study. JMIR Public Health and Surveillance, 8(8), e35735. https://doi.org/10.2196/35735
Hoti, L., Dermaku, K., Klaiqi, S., & Dermaku, H. (2022). Protection and exchange of personal data on the web in the registry of civil status. Emerging Science Journal, 7(1), 38–49. https://doi.org/10.28991/ESJ-2023-07-01-03
Jackson, D., Wenz, K., Muniz, M., Abouzahr, C., Schmider, A., Braschi, M. W., Kassam, N., Diaz, T., Mwamba, R., Setel, P., & Mills, S. (2018). Civil registration and vital statistics in health systems. Bulletin of the World Health Organization, 96(12), 861–863. https://doi.org/10.2471/blt.18.213090 
Kalankesh, L. R., Nasiry, Z., Fein, R., & Damanabi, S. (2020). Factors Influencing User Satisfaction with Information Systems: A Systematic Review. Galen Medical Journal, 9. https://doi.org/10.31661/gmj.v9i.1686
Kapo, A., Turulja, L., Zaimović, T., & Mehić, S. (2021). Examining the effect of user satisfaction and business intelligence system usage on individual job performance. Management, 26(2), 43–62. https://doi.org/10.30924/mjcmi.26.2.3
Kruger, R., Brosens, J., & Hattingh, M. (2020). A methodology to compare the usability of information systems. In Lecture notes in computer science (pp. 452–463). https://doi.org/10.1007/978-3-030-45002-1_39
Kyamko, M. (2025, September 25). Meeting customer expectations: importance, strategies to exceed them, and management tips. Crowdspring Blog. https://www.crowdspring.com/blog/customer-expectations/
Lascuña, L. D., & Junsay, M. D. (2023). Service quality dimensions as predictors of customer satisfaction in the civil Registry. International Journal of Research and Innovation in Social Science, VII(IV), 1459–1470. https://doi.org/10.47772/ijriss.2023.7521
Laumer, S., Maier, C., & Weitzel, T. (2017). Information quality, user satisfaction, and the manifestation of workarounds: a qualitative and quantitative study of enterprise content management system users. European Journal of Information Systems, 26(4), 333–360. https://doi.org/10.1057/s41303-016-0029-7
Lee, Y., Hwang, S., & Wang, E. M. (2006). An integrated framework for continuous improvement on user satisfaction of information systems. Industrial Management & Data Systems, 106(4), 581–595. https://doi.org/10.1108/02635570610661633
McDowall, B., & Mills, S. (2019). Cloud-based services for electronic civil registration and vital statistics systems. Journal of Health Population and Nutrition, 38(S1). https://doi.org/10.1186/s41043-019-0181-5 
Musadad, D. A., Angkasawati, T. J., Usman, Y., Kelly, M., & Rao, C. (2023). Implementation research for developing Civil Registration and Vital Statistics (CRVS) Systems: lessons from Indonesia. BMJ Global Health, 8(7), e012358. https://doi.org/10.1136/bmjgh-2023-012358 
Philippine Department of Health, Philippine Statistics Authority, Canadian Department of Foreign Affairs, Trade and Development, World Health Organization, & United Nations Economic and Social Commission for Asia and the Pacific. (2014). Strengthening civil registration and vital statistics: A case study of the Philippines. https://getinthepicture.org/resource/philippines-country-case-studies-and-investment-plans
Philippine Statistics Authority. (2021, October). Improving Philippine civil registration and vital statistics through digital transformation. 15th National Convention on Statistics. https://psa.gov.ph/sites/default/files/ncs/paper-presentations-manuscripts/Improving%20Philippine%20Civil%20Registration%20and%20Vital%20Statistics%20through%20Digital.pdf
Presidential Communications Office. (2023, May 31). PBBM wants 95% of gov’t transactions to be done digitally. https://pco.gov.ph/news_releases/pbbm-wants-95-of-govt-transactions-to-be-done-digitally/
Peeters, R., & Widlak, A. (2018). The digital cage: Administrative exclusion through information architecture – The case of the Dutch civil registry’s master data management system. Government Information Quarterly, 35(2), 175–183. https://doi.org/10.1016/j.giq.2018.02.003
Rasmika, R., Mujahid, M., & Suyuthi, N. F. (2023). Management Strategy in Public Services at the Civil Registry Office. Journal La Bisecoman, 4(5), 200–214. https://doi.org/10.37899/journallabisecoman.v4i5.1644 
Sari, W. P., Pamuncak, A. W., & Kurnianingsih, M. (2022). Birth certificate standing in proof of inheritance in the district court. Advances in Social Science, Education and Humanities Research/Advances in Social Science, Education and Humanities Research. https://doi.org/10.2991/assehr.k.220501.028
Suthar, A. B., Khalifa, A., Yin, S., Wenz, K., Fat, D. M., Mills, S. L., Nichols, E., AbouZahr, C., & Mrkic, S. (2019). Evaluation of approaches to strengthen civil registration and vital statistics systems: A systematic review and synthesis of policies in 25 countries. PLoS Medicine, 16(9), e1002929. https://doi.org/10.1371/journal.pmed.1002929
Tahsina, T., Iqbal, A., Rahman, A. E., Chowdhury, S. K., Chowdhury, A. I., Billah, S. M., Rahman, A., Parveen, M., Ahmed, L., Rahman, Q. S., Ashrafi, S. a. A., & Arifeen, S. E. (2022). Birth and death notifications for Improving civil Registration and vital Statistics in Bangladesh: pilot Exploratory study. JMIR Public Health and Surveillance, 8(, e25735. https://doi.org/10.2196/25735 
Van Der Straaten, J. (2021). Innovations in monitoring vital events. Mobile phone SMS support to improve coverage of birth and Death Registration.A scalable Solution (From Tanzania) - a review. SSRN Electronic Journal. https://doi.org/10.2139/ssrn.3895851
Varma, A. (2018). Mobile Banking Choices of Entrepreneurs: A Unified Theory of Acceptance and Use of Technology (UTAUT) perspective. Theoretical Economics Letters, 08(14), 2921–2937. https://doi.org/10.4236/tel.2018.814183
Villena, J. P. A., Bandala, A. A., & Bayangos, A. T. (2021). Analysis on acquisition of Philippine civil registry documents and inclination towards paperless e-government. IOP Conference Series: Materials Science and Engineering, 1072(1), 012058. https://iopscience.iop.org/article/10.1088/1757-899X/1072/1/012058
Villena, L. E. A., Robielos, R. a. C., & Shiang, W. (2021). Analysis on acquisition of Philippine Civil Registry Documents and inclination towards paperless e-government. IOP Conference Series Materials Science and Engineering, 1072(1), 012058. https://doi.org/10.1088/1757-899x/1072/1/012058 
World Bank Group. (2018). Global Civil Registration and Vital Statistics Scaling Up Investment Plan 2015-2024. In World Bank. https://www.worldbank.org/en/topic/health/publication/global-civil-registration-vital-statistics-scaling-up-investment
World Health Organization. (2021). CRVS strategic implementation plan      2021–2025. https://iris.who.int/bitstream/handle/10665/342847/9789240022492-eng.pdf




















APPENDICES
Appendix 1. Filled-up Survey Questionnaire

 

 

 

 

 

 
 



 

 


 




 

 





 




 


 
Appendix 2. Raw/Tabulated Data

 

Appendix 3. Acceptance Form
 




 

 


 


Appendix 4. Relevant Source Code
	Appendix 4.1 Code Snippet for Super Admin User and Role Management
 



Appendix 4.2 Code Snippet for Super Admin Released Approved Certificates
 




Appendix 4.3 Code Snippet for Super Admin Data Analytics
 
 
Appendix 4.4 Code Snippet for Upcomming Appointment
 
Appendix 4.5 Code Snippet for Detailed Certificate Reports
 
Appendix 4.6 Code Snippet for Transaction History
 
Appendix 4.7 Code Snippet for Admin Data Analytics Report
 

Appendix 4.8 Code Snippet for Encoding Function
 
Appendix 4.9 Code Snippet For Admin User feedback
 
Appendix 4.10 Code Snippet for Admin Generate and Print forms
 
Appendix 4.11 Code Snippet for User Book Appointment
 

Appendix 4.12 Code Snippet for Displays Processing Time for Each Type of Civil Registry Transaction
 
Appendix 4.13 Code Snippet for User Receives Status Updates for Appointment Approval
 
Appendix 4.14 Code Snippet for User Feedback Submission
 
Appendix 4.15 Code Snippet for Input Forms of Civil Registry Documents
 
Appendix 5. Nomination Form (Outline) 


Appendix 6. Application for Oral Defense (Outline)
 



Appendix 7. Capstone Outline Processing Form (Outline)

 

Appendix 8. Permit to Conduct
 
Appendix 9. Photo Documentation

 


Appendix 10. Communication Letters
 
CURRICULUM VITAE
Name: Sandara Lariego Siatoca	
Address:  Purok 6, Lapulabao, Hagonoy, Davao del Sur	
E-mail Address:  sandara.siatoca@dssc.edu.ph	
Phone Number: 09382018429	
	
PERSONAL PARTICULARS
Place of Birth:  	Lapulabao, Hagonoy, Davao del Sur
Date of Birth: 	September 21, 2004
Age: 	21
Sex: 	Female
Civil Status: 	Single
Religion: 	Roman Catholic
PARENTS	
	
	Father: Emmanuel Siatoca	Occupation: Laborer
	Mother: Josephine Lariego	Occupation:  Laborer

SIBLINGS
			
	Name: Kim Lariego Siatoca			
			
EDUCATIONAL ATTAINMENT
Elementary Level
	Name of the School: Ciriaco B. Gayud Elementary School
	Address:  Mahayahay, Hagonoy, Davao del Sur
	School Year Graduated:  2009-2015
			
Junior High School
	Name of the School:  Lapulabao National High School
	Address: Lapulabao, Hagonoy, Davao del Sur
	School Year Graduated:  2016-2020
			
Senior High School
	Name of the School: Holy Cross of Hagonoy Inc.
	Address Poblacion, Hagonoy, Davao del Sur
	School Year Graduated:  2021-2022

College
	Name of the School: Davao del Sur State College
	School Year Started: 2022-2023
Name: Aliser jay Catunao Valderama	

Address: Purok 10, Christian Village, Digos City, Davao del Sur	
E-mail Address: aliserjay.valderama@dssc.edul.ph	
Phone Number: 09505426526 	
	
PERSONAL PARTICULARS
Place of Birth:  	Digos City Davao del Sur
Date of Birth: 	September 16, 2003
Age: 	22
Sex: 	Male
Civil Status: 	Single
Religion: 	Roman Catholic
PARENTS	
	
	Father: Allan S. Valderama	Occupation: Pedicab Driver
	Mother: Luz C. Valerama	Occupation: Lady Guard

SIBLINGS
			
	Name: Angel C. Valderama 			Name: Princess C. Valderama
			
EDUCATIONAL ATTAINMENT
Elementary Level
	Name of the School: Don Mariano Marcos Elementary School
	Address:  Plaridel St. Digos City, Davao del Sur
	School Year Graduated:  2009-2015
			
Junior High School
	Name of the School:  Digos City National High School
	Address: Rizal Avenue Digos City, Davao del Sur
	School Year Graduated:  2016-2020
			
Senior High School
	Name of the School: Asian Institute of Technology Inc.
	Address: Bonifacio 5th Digos City, Davao del Sur
	School Year Graduated:  2020-2022

College
	Name of the School: Davao del Sur State College
	Address: Matti, Digos City
	School Year Started: 2022-2023

