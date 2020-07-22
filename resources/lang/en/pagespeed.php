<?php
return [
    "copy-0"=>"About PageSpeed",
    "copy-1"=>"<p>PageSpeed tool by CMLABS reviews the overall performance of a web page on each cellular and laptop gadgets, and affords hints on how that web page can be improved.</p>
        <p>PageSpeed tool by CMLABS shows each lab and discipline records approximately a web page. Lab records are beneficial for debugging overall performance issues, as it's miles gathered in a managed environment. However, it could now no longer seize real-world bottlenecks. Field records is beneficial for taking pictures true, international consumer enjoy - however has an extra restrained set of metrics. </p>",
    "copy-2"=>"Performance rating",
    "copy-3"=>"At the report, PageSpeed tool shows a rating which summarizes the web page’s overall performance. This rating is decided with the aid of using Lighthouse to accumulate and examine lab records approximately the web page. A rating of ninety or above is taken into consideration good. 50 to ninety is a rating that wishes development, and under 50 is taken into consideration terrible.",
    "copy-4"=>"Real-World Field Data",
    "copy-5"=>"When the PageSpeed tool is given a URL, it'll appear it up within the Chrome User Experience Report (CrUX) dataset. If possible, PageSpeed tool reviews the First Contentful Paint (FCP), First Input Delay (FID), Largest Contentful Paint (LCP), and Cumulative Layout Shift (CLS) metric records for the beginning and probably the unique web page URL.",
    "copy-6"=>"Classifying Good, Needs Improvement, Poor",
    "copy-7"=>"PageSpeed tool additionally classifies discipline records into three buckets, describing stories deemed good, wishes development, or bad. PageSpeed units the subsequent thresholds for good / wishes development / bad, primarily based totally on our evaluation of the CrUX dataset:",
    "copy-8"=>"Good",
    "copy-9"=>"Need Improvement",
    "copy-10"=>"Bad",
    "copy-11"=>"FCP",
    "copy-12"=>"[0, 1000ms]",
    "copy-13"=>"(1000ms, 3000ms)",
    "copy-14"=>"Over 3000ms",
    "copy-15"=>"FID",
    "copy-16"=>"[0, 100ms]",
    "copy-17"=>"(100ms, 300ms)",
    "copy-18"=>"Over 300ms",
    "copy-19"=>"LCP",
    "copy-20"=>"[0, 2500ms]",
    "copy-21"=>"(2500ms, 4000ms)",
    "copy-22"=>"Over dari 4000ms",
    "copy-23"=>"CLS",
    "copy-24"=>"[0, 0,1]",
    "copy-25"=>"(0,1, 0,25)",
    "copy-26"=>"Over dari 0,25",
    "copy-27"=>"Distribution and the metric values",
    "copy-28"=>"PageSpeed tool offers a distribution of those metrics in order that builders can recognize the variety of FCP, FID, LCP, and CLS values for that web page or beginning. This distribution is likewise cut up into 3 categories: Good, Needs Improvement, and Poor, denoted with green, orange, and bright red bars. For example, seeing 14% inside FCP's orange bar shows that 14% of all determined FCP values fall among 1000ms and 3000ms. These records represent a combination view of all web page masses over the preceding 28-day series period.",
    "copy-29"=>"Above the distribution bars, PageSpeed tool reviews the seventy fifth percentile for all metrics. The seventy fifth percentile is chosen in order that builders can recognize the maximum irritating consumer stories on their site. These discipline metric values are labeled as good/wishes development/bad with the aid of using making use of the equal thresholds proven above.",
    "copy-30"=>"Tentang PageSpeed Tool",
    "copy-31"=>"PageSpeed tool melaporkan kinerja halaman pada perangkat mobile dan desktop, dan memberikan saran tentang bagaimana halaman tersebut dapat ditingkatkan.",
    "copy-32"=>"PageSpeed tool menyediakan data lab dan lapangan tentang halaman web. Data lab ini berguna untuk debugging masalah kinerja, karena dikumpulkan di lingkungan yang terkendali. Namun, tool ini mungkin tidak menangkap permasalahan dunia nyata. Data lapangan berguna untuk menangkap pengalaman pengguna nyata yang sebenarnya, tetapi memiliki serangkaian metrik yang lebih terbatas. ",
    "copy-33"=>"Core Web Vitals",
    "copy-34"=>"Core Web Vitals are a usual set of indicators essential to all net stories. The Core Web Vitals metrics are FID, LCP, and CLS, with their respective thresholds. A web page passes the Core Web Vitals evaluation if the seventy fifth percentiles of all 3 metrics are Good. Otherwise, the web page does now no longer byskip the evaluation.",
    "copy-35"=>"Differences among Field Data in PageSpeed tool and CrUX",
    "copy-36"=>"The distinction among the sphere records in the PageSpeed tool as opposed to the Chrome User Experience Report on BigQuery is that PageSpeed records are up to date each day for the 28-day period. The records set on BigQuery is simplest up to date monthly.",
    "copy-37"=>"PageSpeed tool by CMLABS makes use of Lighthouse to research the given URL, producing an overall performance rating that estimates the web page's overall performance on one-of-a-kind metrics, including: First Contentful Paint, Largest Contentful Paint, Speed Index, Cumulative Layout Shift, Time to Interactive, and Total Blocking Time.",
    "copy-38"=>"Each metric is scored and categorized with a icon:",
    "copy-39"=>"Good is indicated with a blue informational circle",
    "copy-40"=>"Needs Improvement is indicated with orange informational circle",
    "copy-41"=>"Poor is indicated with a red informational circle",
    "copy-42"=>"Audits",
    "copy-43"=>"<p>Lighthouse separates its audits into 3 sections:</p>
        <p>Opportunities show hints the way to enhance the web page’s overall performance metrics. Each thought on this segment estimates how lots quicker the web page will load if the development is implemented.</p>
        <p>Diagnostics offer extra facts approximately how a web page adheres to nice practices for net development.</p>
        <p>Passed Audits show the audits which have been handed with the aid of using the web page.</p>",
    "copy-44"=>"Frequently requested questions (FAQs)",
    "copy-45"=>"What tool and community situations does Lighthouse use to simulate a web page load?",
    "copy-46"=>"Currently, Lighthouse simulates a web page load on a mid-tier tool (Moto G4) on a cellular community.",
    "copy-47"=>"Why do the sphere records and lab records every so often contradict every other?",
    "copy-48"=>"The discipline records are an ancient file approximately how a specific URL has performed. It also represents anonymized overall performance records from customers within the real-international on a lot of gadgets and network situations. The lab records are primarily based totally on a simulated load of a web page on a single gadget and fixed set of network situations. As a result, the values might also additionally differ.",
    "copy-49"=>"Why is the seventy fifth percentile selected for all metrics?",
    "copy-50"=>"Our aim is to ensure that pages paintings properly for almost all customers. By that specialize in seventy fifth percentile values for our metrics, this guarantees that pages offer an excellent consumer enjoy beneath neath the maximum difficult gadget and network situations.",
    "copy-51"=>"Why does the FCP in v4 and v5 have one-of-a-kind values?",
    "copy-52"=>"FCP in v5 reviews the seventy fifth percentile (as of November 4th 2019), formerly it turned into the ninetieth percentile. In v4, FCP reviews the median (fiftieth percentile).",
    "copy-53"=>"What is a superb rating for the lab records?",
    "copy-54"=>"Any green rating (ninety+) is taken into consideration good.",
    "copy-55"=>"Why does the overall performance rating alternate from run to run? I didn’t alternate some thing on my web page!",
    "copy-56"=>"Variability in overall performance size is added through some of channels with one-of-a-kind stages of impact. Several not common resources of metric variability are nearby network availability, patron hardware availability, and patron aid contention.",
    "copy-57"=>"Why is the real-international Chrome User Experience Report velocity records now no longer available for a URL?",
    "copy-58"=>"Chrome User Experience Report aggregates real-international velocity records from opted-in customers and calls for that a URL need to be public (crawlable and indexable) and feature enough variety of wonderful samples that offer a representative, anonymized view of overall perfosrmance of the URL.",
    "copy-59"=>"Why is the real-international Chrome User Experience Report velocity records now no longer available for an origin?",
    "copy-60"=>"Chrome User Experience Report aggregates real-international velocity records from opted-in customers and calls for that an origin's root web page need to be public (crawlable and indexable) and feature enough variety of wonderful samples that offer a representative, anonymized view of origin’s overall performance throughout all URLs which might be visited on that origin.",
    "copy-61"=>"Lab records"
];