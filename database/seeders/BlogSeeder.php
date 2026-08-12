<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImages;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Seed blog categories and detailed posts.
     */
    public function run(): void
    {
        // 1. Seed Categories
        $categories = [
            [
                'name' => 'Instagram Automation',
                'slug' => 'instagram-automation',
                'is_active' => true,
            ],
            [
                'name' => 'Meta API Rules',
                'slug' => 'meta-api-rules',
                'is_active' => true,
            ],
            [
                'name' => 'Funnel Optimization',
                'slug' => 'funnel-optimization',
                'is_active' => true,
            ],
            [
                'name' => 'AI DM Marketing',
                'slug' => 'ai-dm-marketing',
                'is_active' => true,
            ],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[$cat['slug']] = BlogCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // 2. Seed Blog Posts with realistic data, feature images, and inner content images
        $posts = [
            [
                'title' => 'How to Build a High-Converting Comment-to-DM Funnel',
                'slug' => 'how-to-build-a-high-converting-comment-to-dm-funnel',
                'category_id' => $categoryModels['funnel-optimization']->id,
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600&auto=format&fit=crop',
                'meta_title' => 'Building Comment-to-DM Funnels | LINKINGROAD',
                'meta_description' => 'Discover how to skyrocket social conversion rates by converting comments directly into Instagram DMs using automated funnels.',
                'is_active' => true,
                'content' => '
                    <p>Marketing funnels are shifting rapidly in 2026. The traditional loop of "click link in bio, navigate to landing page, submit email, check spam folder" is seeing drop-offs of over 85%.</p>
                    <h2>The Rise of Instant DM Fulfilment</h2>
                    <p>By leveraging official Meta APIs, smart brands are converting interest in the comments section directly into a private messaging conversation. When someone comments "INFO", the automation triggers an instant custom message with the resource link.</p>
                    <img src="https://images.unsplash.com/photo-1557200134-90327ee9fafa?q=80&w=600&auto=format&fit=crop" class="my-4 rounded-md border border-white/5 max-w-full" alt="DM mockup" />
                    <h2>Key conversion metrics to optimize:</h2>
                    <ul>
                        <li><strong>Comment-to-Send Rate:</strong> Ensure your keyword trigger is short, clear, and obvious (e.g. "START", not a long sentence).</li>
                        <li><strong>Message-to-Click Rate:</strong> Keep the first DM message concise and include a clear, prominent call-to-action button.</li>
                    </ul>
                ',
            ],
            [
                'title' => 'Instagram DM Automation: The Ultimate Meta API Compliance Guide',
                'slug' => 'instagram-dm-automation-the-ultimate-meta-api-compliance-guide',
                'category_id' => $categoryModels['meta-api-rules']->id,
                'image' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?q=80&w=600&auto=format&fit=crop',
                'meta_title' => 'Meta API Compliance for DM Automation | LINKINGROAD',
                'meta_description' => 'Learn how to keep your social accounts safe, compliant, and in Meta good standing using official developer APIs.',
                'is_active' => true,
                'content' => '
                    <p>Automating your social media messaging can generate incredible engagement, but running unauthorized web-scrapers or unofficial API wrappers is a shortcut to getting your page banned.</p>
                    <h2>Official Meta Messenger APIs</h2>
                    <p>Meta provides official webhook event endpoints for tracking comments, messages, and mentions. Official automation tools communicate securely with Meta servers, protecting your page credibility.</p>
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop" class="my-4 rounded-md border border-white/5 max-w-full" alt="Digital compliance" />
                    <h2>Meta Compliance Checklist:</h2>
                    <ol>
                        <li>Always use official partner developer apps.</li>
                        <li>Never send unsolicited promotional broadcasts outside the 24-hour customer service window.</li>
                        <li>Provide an easy opt-out keyword like "STOP".</li>
                    </ol>
                ',
            ],
            [
                'title' => '5 Ways Social Automation Boosts ROI for Online Coaches',
                'slug' => '5-ways-social-automation-boosts-roi-for-online-coaches',
                'category_id' => $categoryModels['instagram-automation']->id,
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=600&auto=format&fit=crop',
                'meta_title' => 'ROI Benefits of Coaching Automation | LINKINGROAD',
                'meta_description' => 'Automate lead qualification, onboarding, and appointment booking so you can focus on building high-value relationships.',
                'is_active' => true,
                'content' => '
                    <p>Coaches and service providers spend hours every day replying to Instagram DMs and comment queries manually. Automation changes the game by running qualifying filters before you even touch the keyboard.</p>
                    <h2>1. Qualifying Leads Automatically</h2>
                    <p>Instead of manually asking "What is your current monthly revenue?", your automation can ask lead qualification questions in a conversational style via direct messages, and record responses.</p>
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=600&auto=format&fit=crop" class="my-4 rounded-md border border-white/5 max-w-full" alt="Team meeting" />
                    <h2>2. Scheduling Booked Calls In Messaging</h2>
                    <p>Integrate scheduling links directly into your automatic conversations. Leads get qualified and book directly onto your Calendar in a single, continuous, friction-free loop.</p>
                ',
            ],
            [
                'title' => 'Optimizing AI Chatbots: Scripting Natural Conversational Flows',
                'slug' => 'optimizing-ai-chatbots-scripting-natural-conversational-flows',
                'category_id' => $categoryModels['ai-dm-marketing']->id,
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop',
                'meta_title' => 'Optimizing DM Chatbot Scripts | LINKINGROAD',
                'meta_description' => 'A guide to writing natural conversational chatbot copy that builds brand loyalty and drives sales conversions.',
                'is_active' => true,
                'content' => '
                    <p>Nobody likes chatting with a robotic, cold machine. When scripting your AI DM automations, focusing on high-quality copywriting and natural styling is the key to building trust.</p>
                    <h2>Injecting Brand Voice</h2>
                    <p>Use emojis strategically, keep sentences brief, and match the tone of your standard social media feed posts. Make the transition to a real human seamless and clear.</p>
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop" class="my-4 rounded-md border border-white/5 max-w-full" alt="Creative workspace" />
                    <h2>A/B Testing Chat Branches:</h2>
                    <ul>
                        <li>Test simple multi-choice button branches vs open text answers.</li>
                        <li>Measure conversation completion rates across different script setups.</li>
                    </ul>
                ',
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );

            // Log images in the blog images gallery manager
            BlogImages::firstOrCreate(
                ['image_link' => $post['image']],
                ['image_link' => $post['image']]
            );

            // Extract and log any inner images present in the content
            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $post['content'], $matches)) {
                $innerImageLink = $matches[1];
                BlogImages::firstOrCreate(
                    ['image_link' => $innerImageLink],
                    ['image_link' => $innerImageLink]
                );
            }
        }
    }
}
