<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Service 1',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Business Setup & India Entry',
                        'slug' => 'business-setup-india-entry',
                        'subtitle' => 'Start, structure, and scale in India with end-to-end legal and regulatory support.',
                        'description' => 'Entering India can be complex—entity choice, FEMA, banking, tax, labour, and local registrations all need to be sequenced the right way. We simplify the journey with clear options, predictable timelines, and compliant documentation from day one.',
                        'overview' => 'Whether you are a foreign founder, a global company setting up a subsidiary, or an Indian startup looking to expand, we help you pick the right structure (Pvt Ltd, LLP, Branch, Liaison), complete incorporation, open bank accounts, and complete all statutory registrations. We also align FEMA/RBI compliance for foreign investment, board governance, and ongoing company secretarial tasks.',
                        'service_highlights' => [
                            ['title' => 'Pvt Ltd / LLP / Branch / Liaison setup'],
                            ['title' => 'Name reservation, MOA/AOA, DIN, DSC'],
                            ['title' => 'PAN, TAN, GST, IEC, Shops & Establishment'],
                        ],
                        'how_it_works' => [
                            ['title' => 'Discovery & Planning', 'description' => 'Understand business model, promoter profile, cross-border flows, and choose the right route.'],
                            ['title' => 'Name & Documents', 'description' => 'Name reservation, digital signatures, IDs, charter documents (MOA/AOA/LLP Agreement).'],
                            ['title' => 'Incorporation', 'description' => 'Filing with MCA; issue certificates of incorporation/registration; board constitution.'],
                            ['title' => 'Bank & Registrations', 'description' => 'Open current account; PAN, TAN, GST, IEC, Shops & Establishments, Professional Tax as required.'],
                            ['title' => 'FEMA Alignment', 'description' => 'FDI reporting (FC-GPR), share allotments, shareholder agreements, capitalization tables.'],
                            ['title' => 'Ongoing Compliance', 'description' => 'Board/AGM, statutory registers, ROC filings, accounting handoff, and calendars.'],
                        ],
                        'deliverables' => [
                            ['title' => 'Certificate of Incorporation and charter documents'],
                            ['title' => 'Company master data, DIN/DSC for directors/partners'],
                            ['title' => 'PAN, TAN, GST, IEC and any shop/estt registrations'],
                            ['title' => 'Board resolutions and statutory registers starter kit'],
                            ['title' => 'FDI filings (where applicable) and bank account support'],
                        ],
                        'faqs' => [
                            ['question' => 'What entity should I choose?', 'answer' => 'Most foreign-owned businesses prefer a Private Limited Company for flexibility and funding. Branch/Liaison routes are suitable for limited scopes. We advise based on your goals, sector, and compliance appetite.'],
                            ['question' => 'How long does incorporation take?', 'answer' => 'Typical incorporation takes 7-15 working days depending on name approval, signatures, and MCA processing time. Registrations like GST/IEC run in parallel.'],
                            ['question' => 'Do you assist with bank account opening?', 'answer' => 'Yes. We coordinate with banking partners, provide documentation sets, and guide KYC to speed up the process.'],
                            ['question' => 'Can you handle FEMA compliance end-to-end?', 'answer' => 'Yes. We structure FDI, draft documents, and complete FIRMS filings like FC-GPR/FLA and downstream reporting when applicable.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'व्यवसाय स्थापना और भारत प्रवेश',
                        'slug' => 'business-setup-india-entry-hi',
                        'subtitle' => 'संपूर्ण कानूनी और नियामक सहायता के साथ भारत में शुरुआत करें, संरचना बनाएं और विस्तार करें।',
                        'description' => 'भारत में प्रवेश जटिल हो सकता है—इकाई चयन, FEMA, बैंकिंग, कर, श्रम और स्थानीय पंजीकरण सभी को सही तरीके से क्रमबद्ध करने की आवश्यकता है।',
                        'overview' => 'चाहे आप विदेशी संस्थापक हों, सहायक कंपनी स्थापित करने वाली वैश्विक कंपनी हों, या विस्तार करने वाली भारतीय स्टार्टअप हों, हम सही संरचना चुनने में मदद करते हैं।',
                        'service_highlights' => [
                            ['title' => 'Pvt Ltd / LLP / शाखा / संपर्क स्थापना'],
                            ['title' => 'नाम आरक्षण, MOA/AOA, DIN, DSC'],
                            ['title' => 'PAN, TAN, GST, IEC, दुकान और प्रतिष्ठान'],
                        ],
                        'how_it_works' => [
                            ['title' => 'खोज और योजना', 'description' => 'व्यवसाय मॉडल, प्रमोटर प्रोफाइल को समझें और सही मार्ग चुनें।'],
                            ['title' => 'नाम और दस्तावेज़', 'description' => 'नाम आरक्षण, डिजिटल हस्ताक्षर, आईडी, चार्टर दस्तावेज़।'],
                            ['title' => 'निगमन', 'description' => 'MCA के साथ फाइलिंग; निगमन प्रमाणपत्र जारी करना।'],
                        ],
                        'deliverables' => [
                            ['title' => 'निगमन प्रमाणपत्र और चार्टर दस्तावेज़'],
                            ['title' => 'कंपनी मास्टर डेटा, DIN/DSC'],
                            ['title' => 'PAN, TAN, GST, IEC पंजीकरण'],
                        ],
                        'faqs' => [
                            ['question' => 'मुझे कौन सी इकाई चुननी चाहिए?', 'answer' => 'अधिकांश विदेशी स्वामित्व वाले व्यवसाय लचीलेपन और फंडिंग के लिए प्राइवेट लिमिटेड कंपनी को प्राथमिकता देते हैं।'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Service 2',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Corporate Secretarial & Compliance Management',
                        'slug' => 'corporate-secretarial-compliance',
                        'subtitle' => 'Stay audit-ready with systematic board governance, statutory registers, and ROC filings.',
                        'description' => 'Corporate compliance in India is dense—board meetings, AGMs, ROC returns, event-driven filings, and registers all need to be maintained in real-time. One missed deadline can trigger penalties and auditor flags.',
                        'overview' => 'We manage your entire corporate secretarial calendar: drafting board/AGM minutes, maintaining statutory registers, preparing and filing annual returns (AOC-4, MGT-7), handling event-driven compliances (allotments, charges, director changes), and ensuring XBRL/iXBRL accuracy. You get peace of mind knowing your MCA record is always current.',
                        'service_highlights' => [
                            ['title' => 'Board/AGM minutes and statutory registers'],
                            ['title' => 'ROC e-filings (AOC-4, MGT-7), XBRL'],
                            ['title' => 'Event compliances: allotment, ESOP, charges'],
                        ],
                        'how_it_works' => [
                            ['title' => 'Onboarding & Audit', 'description' => 'Review existing registers, past filings, and identify pending compliances.'],
                            ['title' => 'Calendar Setup', 'description' => 'Map out all annual, quarterly, and event-driven compliance deadlines.'],
                            ['title' => 'Documentation', 'description' => 'Draft board resolutions, AGM notices, minutes, and maintain digital registers.'],
                            ['title' => 'Filing & Tracking', 'description' => 'Complete ROC e-forms, upload XBRL, track acknowledgments, and update registers.'],
                            ['title' => 'Continuous Support', 'description' => 'Respond to ROC queries, handle rectifications, and keep records audit-ready.'],
                        ],
                        'deliverables' => [
                            ['title' => 'Statutory registers (directors, members, charges, etc.)'],
                            ['title' => 'Board and AGM minutes and resolutions'],
                            ['title' => 'ROC annual filings (AOC-4, MGT-7) with XBRL'],
                            ['title' => 'Event-driven forms (PAS-3, CHG-1, DIR-12, etc.)'],
                            ['title' => 'Compliance calendar and tracker'],
                        ],
                        'faqs' => [
                            ['question' => 'What happens if we miss a filing deadline?', 'answer' => 'Late filings attract additional fees and penalties. We maintain proactive calendars to ensure all deadlines are met well in advance.'],
                            ['question' => 'Do you handle XBRL conversion?', 'answer' => 'Yes. We prepare and validate XBRL/iXBRL documents for AOC-4 and other applicable forms.'],
                            ['question' => 'Can you assist with past compliance gaps?', 'answer' => 'Yes. We conduct compliance audits, identify gaps, and regularize pending filings through compounding or condonation where needed.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'कॉर्पोरेट सचिवीय और अनुपालन प्रबंधन',
                        'slug' => 'corporate-secretarial-compliance-hi',
                        'subtitle' => 'व्यवस्थित बोर्ड शासन के साथ ऑडिट-तैयार रहें।',
                        'description' => 'भारत में कॉर्पोरेट अनुपालन घना है—बोर्ड बैठकें, AGM, ROC रिटर्न सभी को वास्तविक समय में बनाए रखने की आवश्यकता है।',
                        'overview' => 'हम आपके संपूर्ण कॉर्पोरेट सचिवीय कैलेंडर का प्रबंधन करते हैं।',
                        'service_highlights' => [
                            ['title' => 'बोर्ड/AGM मिनट और वैधानिक रजिस्टर'],
                            ['title' => 'ROC ई-फाइलिंग (AOC-4, MGT-7), XBRL'],
                        ],
                        'how_it_works' => [
                            ['title' => 'ऑनबोर्डिंग और ऑडिट', 'description' => 'मौजूदा रजिस्टर और पिछली फाइलिंग की समीक्षा करें।'],
                        ],
                        'deliverables' => [
                            ['title' => 'वैधानिक रजिस्टर'],
                            ['title' => 'ROC वार्षिक फाइलिंग'],
                        ],
                        'faqs' => [
                            ['question' => 'यदि हम फाइलिंग की समय सीमा चूक जाते हैं तो क्या होता है?', 'answer' => 'देर से फाइलिंग पर अतिरिक्त शुल्क और जुर्माना लगता है।'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Service 3',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Regulatory & FEMA Advisory',
                        'slug' => 'regulatory-fema-advisory',
                        'subtitle' => 'Navigate FDI, ODI, ECB, and cross-border flows with expert FEMA guidance.',
                        'description' => 'Foreign Exchange Management Act (FEMA) governs all cross-border capital flows in India. Whether you are raising FDI, making overseas investments, or borrowing externally, compliance is mandatory and penalties are steep.',
                        'overview' => 'We structure FDI/ODI transactions, advise on sectoral caps and approval routes, prepare and file FC-GPR, FLA, SMF forms on FIRMS portal, handle RBI approvals, compounding applications, and downstream investment reporting. Our team ensures your foreign exchange flows are always compliant and audit-ready.',
                        'service_highlights' => [
                            ['title' => 'FDI, ODI, ECB structuring and compliance'],
                            ['title' => 'FC-GPR, FLA, SMF filings on FIRMS'],
                            ['title' => 'RBI approvals, compounding, downstream'],
                        ],
                        'how_it_works' => [
                            ['title' => 'Transaction Structuring', 'description' => 'Analyze the nature of investment, identify applicable FEMA rules, and structure the transaction.'],
                            ['title' => 'Documentation', 'description' => 'Draft valuation certificates, share subscription agreements, board resolutions, and filings.'],
                            ['title' => 'Filings & Approvals', 'description' => 'Complete FIRMS filings (FC-GPR, FLA, SMF), apply for RBI approvals if required.'],
                            ['title' => 'Ongoing Compliance', 'description' => 'Annual reporting, audits, and ad-hoc filings for follow-on investments or exits.'],
                        ],
                        'deliverables' => [
                            ['title' => 'FEMA advisory note and transaction structure'],
                            ['title' => 'Valuation certificate and pricing rationale'],
                            ['title' => 'FC-GPR, FLA, SMF filings on FIRMS portal'],
                            ['title' => 'RBI approval letters (where applicable)'],
                            ['title' => 'Annual compliance tracker and audit support'],
                        ],
                        'faqs' => [
                            ['question' => 'What is FC-GPR and when is it required?', 'answer' => 'FC-GPR (Form for Reporting FDI) must be filed within 30 days of receiving foreign investment or issuing shares to non-residents.'],
                            ['question' => 'Do I need RBI approval for FDI?', 'answer' => 'Most sectors allow FDI under the automatic route. Government/RBI approval is needed for sectors with caps or restrictions.'],
                            ['question' => 'What happens if FEMA filings are delayed?', 'answer' => 'Delayed filings attract penalties and may require compounding applications to RBI. We help regularize such cases.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'नियामक और FEMA सलाह',
                        'slug' => 'regulatory-fema-advisory-hi',
                        'subtitle' => 'विशेषज्ञ FEMA मार्गदर्शन के साथ FDI, ODI, ECB को नेविगेट करें।',
                        'description' => 'विदेशी मुद्रा प्रबंधन अधिनियम (FEMA) भारत में सभी सीमा पार पूंजी प्रवाह को नियंत्रित करता है।',
                        'overview' => 'हम FDI/ODI लेनदेन की संरचना करते हैं।',
                        'service_highlights' => [
                            ['title' => 'FDI, ODI, ECB संरचना और अनुपालन'],
                            ['title' => 'FIRMS पर FC-GPR, FLA, SMF फाइलिंग'],
                        ],
                        'how_it_works' => [
                            ['title' => 'लेनदेन संरचना', 'description' => 'निवेश की प्रकृति का विश्लेषण करें।'],
                        ],
                        'deliverables' => [
                            ['title' => 'FEMA सलाहकार नोट'],
                            ['title' => 'FC-GPR, FLA, SMF फाइलिंग'],
                        ],
                        'faqs' => [
                            ['question' => 'FC-GPR क्या है?', 'answer' => 'FC-GPR विदेशी निवेश प्राप्त करने के 30 दिनों के भीतर दाखिल किया जाना चाहिए।'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Service 4',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Intellectual Property Rights (IPR)',
                        'slug' => 'intellectual-property-rights',
                        'subtitle' => 'Protect your brand, innovations, and creative works with strategic IP management.',
                        'description' => 'Your brand and innovations are valuable assets. Whether its a trademark, copyright, design, or patent, securing IP rights early prevents costly disputes and protects your competitive edge.',
                        'overview' => 'We handle trademark search, filing, prosecution, and renewals across classes. We also assist with copyright registrations, design applications, assignments, licensing, and IP watch services. Our team monitors opposition proceedings, handles rectifications, and ensures your IP portfolio stays protected and enforceable.',
                        'service_highlights' => [
                            ['title' => 'Trademark search, filing, prosecution, renewals'],
                            ['title' => 'Copyrights, designs, assignments & licensing'],
                            ['title' => 'Watch services, oppositions, rectifications'],
                        ],
                        'how_it_works' => [
                            ['title' => 'IP Audit & Strategy', 'description' => 'Identify protectable IP assets and recommend filing strategy.'],
                            ['title' => 'Search & Analysis', 'description' => 'Conduct trademark/design searches to assess availability and conflicts.'],
                            ['title' => 'Filing & Prosecution', 'description' => 'Prepare and file applications, respond to examination reports.'],
                            ['title' => 'Opposition & Defense', 'description' => 'Handle oppositions, cancellations, and rectification proceedings.'],
                            ['title' => 'Portfolio Management', 'description' => 'Track renewals, assignments, and licensing agreements.'],
                        ],
                        'deliverables' => [
                            ['title' => 'Trademark/design/copyright applications'],
                            ['title' => 'Search reports and availability analysis'],
                            ['title' => 'Registration certificates'],
                            ['title' => 'Assignment and licensing agreements'],
                            ['title' => 'IP portfolio tracker and renewal reminders'],
                        ],
                        'faqs' => [
                            ['question' => 'How long does trademark registration take?', 'answer' => 'Typically 12-18 months from filing to registration, depending on examination and opposition timelines.'],
                            ['question' => 'Do I need to register in multiple classes?', 'answer' => 'If your brand spans multiple product/service categories, filing in multiple classes provides broader protection.'],
                            ['question' => 'What is IP watch service?', 'answer' => 'We monitor new trademark applications similar to yours and alert you to potential conflicts for timely opposition.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'बौद्धिक संपदा अधिकार (IPR)',
                        'slug' => 'intellectual-property-rights-hi',
                        'subtitle' => 'रणनीतिक IP प्रबंधन के साथ अपने ब्रांड की सुरक्षा करें।',
                        'description' => 'आपका ब्रांड और नवाचार मूल्यवान संपत्ति हैं।',
                        'overview' => 'हम ट्रेडमार्क खोज, फाइलिंग, अभियोजन संभालते हैं।',
                        'service_highlights' => [
                            ['title' => 'ट्रेडमार्क खोज, फाइलिंग, नवीनीकरण'],
                            ['title' => 'कॉपीराइट, डिजाइन, असाइनमेंट'],
                        ],
                        'how_it_works' => [
                            ['title' => 'IP ऑडिट और रणनीति', 'description' => 'संरक्षण योग्य IP संपत्तियों की पहचान करें।'],
                        ],
                        'deliverables' => [
                            ['title' => 'ट्रेडमार्क/डिजाइन आवेदन'],
                            ['title' => 'पंजीकरण प्रमाणपत्र'],
                        ],
                        'faqs' => [
                            ['question' => 'ट्रेडमार्क पंजीकरण में कितना समय लगता है?', 'answer' => 'आम तौर पर फाइलिंग से पंजीकरण तक 12-18 महीने।'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Service 5',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Corporate Transactions & Legal Documentation',
                        'slug' => 'corporate-transactions-legal-docs',
                        'subtitle' => 'Draft, review, and negotiate contracts that protect your interests and drive growth.',
                        'description' => 'Every business transaction needs clear, enforceable documentation. Whether its a shareholder agreement, employment contract, or vendor deal, the right legal language prevents disputes and aligns expectations.',
                        'overview' => 'We draft and review shareholder agreements (SHA), share subscription agreements (SSA), ESOP schemes, founder/co-founder agreements, term sheets, joint venture deals, M&A documents, due diligence reports, vendor contracts, employment agreements, NDAs, SaaS/MSA agreements, and more. Our documents are practical, enforceable, and tailored to your business goals.',
                        'service_highlights' => [
                            ['title' => 'SHA, SSA, ESOP, Founder/Co-founder docs'],
                            ['title' => 'Term sheets, JV, M&A, due diligence'],
                            ['title' => 'Vendor, employment, NDAs, SaaS/MSA contracts'],
                        ],
                        'how_it_works' => [
                            ['title' => 'Requirement Analysis', 'description' => 'Understand transaction structure, parties, and key commercial terms.'],
                            ['title' => 'Drafting', 'description' => 'Prepare first draft with clear rights, obligations, and dispute resolution clauses.'],
                            ['title' => 'Review & Negotiation', 'description' => 'Iterate based on feedback, negotiate terms with counterparties.'],
                            ['title' => 'Execution Support', 'description' => 'Coordinate signatures, notarization, and filings if needed.'],
                            ['title' => 'Compliance Check', 'description' => 'Ensure documents align with corporate governance and regulatory requirements.'],
                        ],
                        'deliverables' => [
                            ['title' => 'Executed legal agreements'],
                            ['title' => 'Drafts and redlined versions for negotiation'],
                            ['title' => 'Summary of key terms and obligations'],
                            ['title' => 'Compliance checklist and filing guidance'],
                        ],
                        'faqs' => [
                            ['question' => 'What is a SHA and when do I need it?', 'answer' => 'A Shareholder Agreement defines rights, obligations, and exit terms among shareholders. Essential for startups with multiple co-founders or investors.'],
                            ['question' => 'Can you review contracts drafted by others?', 'answer' => 'Yes. We review, redline, and provide risk analysis and negotiation support.'],
                            ['question' => 'Do you handle M&A transactions?', 'answer' => 'Yes. We assist with term sheets, due diligence, purchase agreements, and closing documentation.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'कॉर्पोरेट लेनदेन और कानूनी दस्तावेज़',
                        'slug' => 'corporate-transactions-legal-docs-hi',
                        'subtitle' => 'अनुबंधों का मसौदा तैयार करें और समीक्षा करें।',
                        'description' => 'हर व्यावसायिक लेनदेन को स्पष्ट, लागू करने योग्य दस्तावेज़ीकरण की आवश्यकता होती है।',
                        'overview' => 'हम शेयरधारक समझौतों का मसौदा तैयार करते हैं।',
                        'service_highlights' => [
                            ['title' => 'SHA, SSA, ESOP, संस्थापक दस्तावेज़'],
                            ['title' => 'टर्म शीट, JV, M&A'],
                        ],
                        'how_it_works' => [
                            ['title' => 'आवश्यकता विश्लेषण', 'description' => 'लेनदेन संरचना को समझें।'],
                        ],
                        'deliverables' => [
                            ['title' => 'निष्पादित कानूनी समझौते'],
                            ['title' => 'प्रमुख शर्तों का सारांश'],
                        ],
                        'faqs' => [
                            ['question' => 'SHA क्या है?', 'answer' => 'शेयरधारक समझौता शेयरधारकों के बीच अधिकार और दायित्वों को परिभाषित करता है।'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Service 6',
                'image' => null,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Custom Packages',
                        'slug' => 'custom-packages',
                        'subtitle' => 'Tailored legal and compliance solutions for fast-growth teams.',
                        'description' => 'Every business has unique needs. Our custom packages combine multiple services into a single retainer, giving you priority access, dedicated support, and predictable pricing.',
                        'overview' => 'Whether you need ongoing corporate secretarial support, quarterly compliance reviews, or a dedicated legal team for transactions, we design packages that fit your stage, sector, and scale. Get a single point of contact, consolidated billing, and proactive compliance management.',
                        'service_highlights' => [
                            ['title' => 'Tailored retainers for fast-growth teams'],
                            ['title' => 'Dedicated compliance and filings support'],
                            ['title' => 'Priority SLAs and expert reviews'],
                        ],
                        'how_it_works' => [
                            ['title' => 'Consultation', 'description' => 'Discuss your business stage, compliance needs, and transaction pipeline.'],
                            ['title' => 'Package Design', 'description' => 'Propose a bundled service package with pricing and SLAs.'],
                            ['title' => 'Onboarding', 'description' => 'Assign dedicated team, set up communication channels, and define workflows.'],
                            ['title' => 'Ongoing Delivery', 'description' => 'Execute agreed services, provide monthly reports, and scale as needed.'],
                        ],
                        'deliverables' => [
                            ['title' => 'Customized service agreement and SLA'],
                            ['title' => 'Dedicated account manager'],
                            ['title' => 'Monthly compliance and activity reports'],
                            ['title' => 'On-demand support for ad-hoc queries'],
                        ],
                        'faqs' => [
                            ['question' => 'What is included in a custom package?', 'answer' => 'We bundle services like incorporation, secretarial, FEMA, IP, and contracts based on your needs.'],
                            ['question' => 'Is there a minimum commitment period?', 'answer' => 'Most retainers are structured quarterly or annually, but we can discuss shorter terms.'],
                            ['question' => 'Can I scale the package as I grow?', 'answer' => 'Yes. Packages are designed to evolve with your business stage and transaction volume.'],
                        ],
                    ],
                    'hi' => [
                        'title' => 'कस्टम पैकेज',
                        'slug' => 'custom-packages-hi',
                        'subtitle' => 'तेजी से बढ़ने वाली टीमों के लिए अनुकूलित कानूनी समाधान।',
                        'description' => 'हर व्यवसाय की अनूठी जरूरतें होती हैं।',
                        'overview' => 'हम ऐसे पैकेज डिजाइन करते हैं जो आपके चरण के अनुरूप हों।',
                        'service_highlights' => [
                            ['title' => 'तेजी से बढ़ने वाली टीमों के लिए अनुकूलित रिटेनर'],
                            ['title' => 'समर्पित अनुपालन समर्थन'],
                        ],
                        'how_it_works' => [
                            ['title' => 'परामर्श', 'description' => 'अपनी व्यावसायिक आवश्यकताओं पर चर्चा करें।'],
                        ],
                        'deliverables' => [
                            ['title' => 'अनुकूलित सेवा समझौता'],
                            ['title' => 'समर्पित खाता प्रबंधक'],
                        ],
                        'faqs' => [
                            ['question' => 'कस्टम पैकेज में क्या शामिल है?', 'answer' => 'हम आपकी जरूरतों के आधार पर सेवाओं को बंडल करते हैं।'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            $service = Service::create([
                'name' => $serviceData['name'],
                'image' => $serviceData['image'],
                'is_active' => $serviceData['is_active'],
            ]);

            foreach ($serviceData['translations'] as $locale => $translationData) {
                ServiceTranslation::create([
                    'service_id' => $service->id,
                    'locale' => $locale,
                    'title' => $translationData['title'],
                    'slug' => $translationData['slug'],
                    'subtitle' => $translationData['subtitle'],
                    'description' => $translationData['description'],
                    'overview' => $translationData['overview'],
                    'service_highlights' => $translationData['service_highlights'],
                    'how_it_works' => $translationData['how_it_works'],
                    'deliverables' => $translationData['deliverables'],
                    'faqs' => $translationData['faqs'],
                ]);
            }
        }

        $this->command->info('Services seeded successfully!');
    }
}
