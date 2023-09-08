<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Articles extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            $title = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, assumenda.';
            $contentGenerate = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aperiam nemo quo itaque ea pariatur corrupti rem quas molestias ducimus aut, facere alias sed debitis fugit. Qui inventore adipisci dolorem nostrum aliquid, minus dolores optio doloremque? Aliquam neque ipsum sapiente, voluptates quaerat incidunt error? Sapiente sint recusandae, cupiditate voluptates, minima voluptatem possimus aspernatur dolorem porro unde vitae iure. Quas veniam dolorum reiciendis, dicta repudiandae enim quaerat nostrum accusantium delectus natus laboriosam ex error aliquid, libero, fugiat non placeat. Molestiae, impedit ad maxime saepe excepturi veritatis magni fugiat nesciunt esse culpa enim officia alias, nisi cumque beatae recusandae ipsam in iure accusantium consequuntur! Voluptas quibusdam exercitationem id quod architecto? Asperiores beatae exercitationem repellat sit autem necessitatibus omnis vel incidunt dicta cumque inventore, perferendis veritatis quia quas culpa molestias consequuntur voluptas, voluptates illo nihil. Amet explicabo omnis voluptatibus consequuntur quis nisi beatae maiores saepe aspernatur hic ducimus provident odit, incidunt similique, harum autem suscipit sapiente quidem ex nulla error! Perspiciatis eaque maxime aliquid modi et ducimus reprehenderit vel non molestiae inventore voluptate itaque laborum sequi, est totam consequatur facere odit. Eum quam, provident aspernatur repellendus delectus laborum praesentium sint modi molestias voluptatum aperiam vero asperiores blanditiis assumenda reprehenderit inventore sunt laboriosam facere.';
            $introGenerate = 'omnis voluptatibus consequuntur quis nisi beatae maiores saepe aspernatur hic ducimus provident odit, incidunt similique, harum autem suscipit sapiente quidem ex nulla error! Perspiciatis eaque maxime aliquid modi et ducimus reprehenderit vel non molestiae inventore voluptate itaque laborum sequi, est totam consequatur facere odit. Eum quam, provident aspernatur repellendus delectus laborum praesentium sint modi molestias voluptatum aperiam vero asperiores blanditiis assumenda reprehenderit inventore sunt laboriosam facere.';
            $data = [
                'article_title' => $title,
                'article_slug' => url_title($title),
                'article_intro' => $introGenerate,
                'article_content' => $contentGenerate,
                'article_author_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('articles')->insert($data);
        }
    }
}
