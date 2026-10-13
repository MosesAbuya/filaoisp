# Execution Plan Report (EPR): Filao Networks Solutions

**Product Name:** Filao Networks Solutions  
**Product URL:** `https://filaonetworks.com`  
**Date of Analysis:** 2026-10-13  
**Primary Search Engines:** Google · Bing · Perplexity · ChatGPT / OpenAI Search · Copilot  
**GEO / AI Visibility Goal:** Rank in top 3 for Nairobi fiber ISP keywords, secure AI Overview answers, and build entity authority in Bing Copilot & Perplexity  
**Top 5 Priority Keywords:**  
1. *Residential Fiber Internet Kenya*  
2. *Dedicated Internet Access Kenya*  
3. *CCTV Installation Kenya*  
4. *Managed IT Services Kenya*  
5. *Fiber Coverage Map Nairobi*  
**Primary Competitors:** Safaricom Home Fibre, Zuku Fibre, Faiba / Jamii Telecommunications  
**Tech Stack:** PHP Custom Framework, Apache, Bootstrap 5.3, FontAwesome, MySQL/PDO  
**SEO Maturity Level:** Intermediate progressing to Advanced  

---

## 1. Situation Assessment

Filao Networks Solutions operates a technically solid, fast-loading multi-page website covering residential fiber, dedicated enterprise access, CCTV surveillance, and IT infrastructure across Nairobi and Kiambu County. Prior to this optimization, critical technical ranking signals were impaired by hardcoded canonical tags pointing exclusively to the root homepage, an absence of an XML sitemap and robots.txt, and missing Open Graph and Twitter Card tags. The site possessed high content relevance for Kenyan telecommunications but lacked Generative Engine Optimization (GEO) formatting such as answer-first paragraphs, entity graphs, and AI crawler permissions. Implementing a clean technical foundation coupled with structured data and rich FAQ schema represents the fastest ROI path to capture high-intent commercial leads in the Nairobi metropolitan market.

---

## 2. Critical Findings & Technical Deficiencies

1. **Hardcoded Canonical Tag on Every Template:** Every subpage rendered `<link rel="canonical" href="https://filaonetworks.com/">`, signaling to search engines that all internal pages were duplicate mirrors of the homepage.  
   *Official Reference:* [Google Canonicalization Guide](https://developers.google.com/search/docs/crawling-indexing/canonicalization)
2. **Missing XML Sitemap & robots.txt:** New service and blog pages risked slow or incomplete indexation by Googlebot and Bingbot.  
   *Official Reference:* [Google Sitemaps Overview](https://developers.google.com/search/docs/crawling-indexing/sitemaps/overview)
3. **Absence of Generative Engine Permissions & Context:** No `llms.txt` file was present to feed LLMs clean summaries, and AI crawlers lacked explicit allowlist directives.  
   *Official Reference:* [LLMs.txt Standard](https://llmstxt.org) & [OpenAI GPTBot Documentation](https://platform.openai.com/docs/gptbot)
4. **Missing Open Graph & Twitter Cards:** Deficits in social meta tags resulted in unformatted snippets when shared on social networks and degraded Bing's social engagement ranking inputs.  
   *Official Reference:* [Open Graph Protocol](https://ogp.me/) & [Bing Webmaster Guidelines](https://www.bing.com/webmasters/help/webmaster-guidelines-30fba23a)
5. **Boilerplate Titles & Meta Descriptions:** Multiple pages shared identical phrases without target keywords near the beginning of title tags.  
   *Official Reference:* [Google Title Links Best Practices](https://developers.google.com/search/docs/appearance/title-link)

---

## 3. Prioritized Action Plan

### TIER 1 — Critical Technical Foundations
- [x] Create standardized, high-performance `robots.txt` allowing search engines and AI crawlers while restricting `/admin/` and `/api/`.
- [x] Create comprehensive `sitemap.xml` indexing all 35 clean URLs with valid ISO 8601 timestamps and prioritized weights.
- [x] Update `includes/header.php` to resolve dynamic, self-referencing canonical URLs for all pages.
- [x] Implement complete Open Graph (`og:`) and Twitter Card (`twitter:`) metadata across all pages.
- [x] Inject Nairobi, Kenya geographic meta coordinates (`geo.region`, `geo.placename`, `geo.position`).
- [x] Protect administrative routes with `noindex, nofollow` headers.

### TIER 2 — Performance & On-Page Meta Optimization
- [x] Rewrite `<title>` tags across all 35 pages following the `Primary Keyword — Descriptive Phrase | Filao Networks` structure (50–60 chars).
- [x] Rewrite `<meta name="description">` tags (150–160 chars) targeting search intent and compelling calls to action.
- [x] Verify image `alt` tags and asset caching headers in `.htaccess`.
- [x] Verify mobile viewport responsiveness across standard viewports.

### TIER 3 — Schema & Structured Data Entity Graph
- [x] Deploy comprehensive `Organization` and `InternetServiceProvider` JSON-LD schema with `sameAs` entity references.
- [x] Deploy `WebSite` schema with search action definitions.
- [x] Deploy `Service` and `FAQPage` schema on high-traffic landing pages.
- [x] Validate all schema markup against Schema.org and Google Rich Results guidelines.

### TIER 4 — GEO & Generative AI Optimization
- [x] Deploy `llms.txt` at site root providing concise business and service definitions for LLM ingest engines.
- [x] Structure intro paragraphs with 40–60 word Direct Answer Blocks.
- [x] Provide verified factual density (>1 cited statistic per 200 words) on core technical pages.
- [x] Format H2 headings as natural search questions to capture featured snippets and People Also Ask queries.

### TIER 5 — Long-Term Content Strategy & Authority Building
- [x] Produce detailed content briefs for high-growth commercial clusters.
- [x] Generate GEO-optimized long-form content assets for residential fiber, leased lines, and CCTV surveillance.
- [x] Establish quarterly content review cycles and continuous search console tracking.

