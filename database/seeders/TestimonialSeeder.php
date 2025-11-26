<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Dame Damjanoski',
                'company' => null,
                'quote' => 'Zoran came to us as a part-time dev, and has been a great addition to our team. If we have technical issues, code improvement, Zoran will always be available to solve the issue in a fast and effective way. His experience with PHP, Laravel, and my codebase was so deep that he\'d quickly spot a problem and offer a fix in a snap. The thing we really liked was that he was able to explain the challenges of the technology in terms that we understood, and we don\'t have a technical background at all. If you\'re looking for a high-performance Laravel superstar that will come in, figure out, and clean up your backend systems with polish Zoran Bogoevski!!!',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Antonio Velkovski',
                'company' => 'Founder & CEO at SalesMake',
                'quote' => 'I\'ve had the privilege of working with Zoran for 3 years, and I can confidently say that they are one of the most skilled and forward-thinking engineers I\'ve collaborated with. As a Senior Software Engineer and System Architect, Zoran brings a unique combination of deep technical expertise, strategic thinking, and problem-solving abilities that elevate any project they touch. Zoran has a remarkable ability to design scalable and efficient system architectures, ensuring seamless performance and long-term reliability. Their expertise has been instrumental in optimizing workflows and enhancing system efficiency. Beyond their technical acumen, they excel in mentorship and collaboration, always ready to guide team members and contribute innovative solutions that drive business success.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Aleksandar Trajchevski',
                'company' => 'Software Developer at Fueloyal',
                'quote' => 'I had the pleasure of working alongside Zoran as a PHP Laravel developer, and I couldn\'t be more impressed with their expertise and dedication. Zoran possesses a profound understanding of PHP and Laravel framework, consistently delivering high-quality, scalable solutions. His ability to translate complex requirements into elegant code is remarkable.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Igor Christoff',
                'company' => 'CEO/CTO',
                'quote' => 'I highly recommend Zoran as a Senior PHP Developer. During their time with us, he consistently demonstrated a deep understanding of PHP and web development best practices. He effectively led a project delivering high-quality, on time and with great attention to detail. His expertise and dedication were invaluable to our team, and I believe he would be a great asset to any organization.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Martin Bluck MBCS',
                'company' => 'Business Systems Director at Elysium Healthcare',
                'quote' => 'Zoran was a great addition to the team and delivered a suite of APIs that allowed our clients to integrate their HR and BI Platforms directly with our LMS. Zoran has an honest, refreshing no-nonsense approach and was also comfortable speaking directly with clients.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Pamela Utevska',
                'company' => 'Head of HR and Operations',
                'quote' => 'I have collaborated with Zoran on many freelance projects, therefore I highly recommend his expertise to any company looking for a skilled php developer. He is smart and handles every situation very carefully and in the right manner, his ability to tackle any problem is remarkable. There is no doubt that Zoran would become an appreciated member of any team.',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name' => 'Damon Banks',
                'company' => 'VP/Director of Engineering',
                'quote' => 'I had the privilege to manage a team that Zoran was on. He quickly learned the application and was able to make relevant suggestions, give quality feedback and write clean code right away. He is both courteous and professional. He is someone I look forward to working with again in the future.',
                'is_active' => true,
                'order' => 7,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial
            );
        }
    }
}
