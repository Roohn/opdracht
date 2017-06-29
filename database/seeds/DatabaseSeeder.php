<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call('TableSeeder');

      $this->command->info('Modules table seeded!');
    }
}

class TableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('listings')->delete();
        DB::table('tickets')->delete();
        DB::table('barcodes')->delete();

        //insert users
        DB::table('users')->insert([
            [
             'id' => 1,
             'name' => 'Frank',
            ],
            [
              'id' => 2,
              'name' => 'Ruud',
            ],
            [
             'id' => 3,
             'name' => 'Hans',
            ],
            [
             'id' => 4,
             'name' => 'Joe',
            ],
          ]);

          //insert listings
          DB::table('listings')->insert([
              [
               'id' => 1,
               'sellingPrice' => 500,
               'description' => 'Coldplay',
              ],
              [
                'id' => 2,
                'sellingPrice' => 600,
                'description' => 'Adelle',
              ],
              [
               'id' => 3,
               'sellingPrice' => 650,
               'description' => 'Adelle',
              ],
              [
               'id' => 4,
               'sellingPrice' => 500,
               'description' => 'Adelle',
              ],
              [
               'id' => 5,
               'sellingPrice' => 600,
               'description' => 'Coldplay',
              ],
              [
               'id' => 6,
               'sellingPrice' => 660,
               'description' => 'Coldplay',
              ],
            ]);

            //insert tickets
            DB::table('tickets')->insert([
                [
                 'id' => 1,
                 'listingId' => 1,
                 'boughtByUserId' => null,
                 'boughtAtDate' => null,
                ],
                [
                 'id' => 2,
                 'listingId' => 1,
                 'boughtByUserId' => null,
                 'boughtAtDate' => null,
                ],
                [
                 'id' => 3,
                 'listingId' => 2,
                 'boughtByUserId' => 1,
                 'boughtAtDate' => '2016-01-20 10:00:00',
                ],
                [
                 'id' => 4,
                 'listingId' => 3,
                 'boughtByUserId' => 3,
                 'boughtAtDate' => '2016-01-20 16:00:00',
                ],
                [
                 'id' => 5,
                 'listingId' => 4,
                 'boughtByUserId' => 2,
                 'boughtAtDate' => '2016-02-20 10:00:00',
                ],
                [
                 'id' => 6,
                 'listingId' => 5,
                 'boughtByUserId' => 1,
                 'boughtAtDate' => '2016-03-20 12:00:00',
                ],
                [
                 'id' => 7,
                 'listingId' => 6,
                 'boughtByUserId' => 2,
                 'boughtAtDate' => '2016-03-20 12:05:00',
                ],
              ]);

              //insert barcodes
              DB::table('barcodes')->insert([
                  [
                   'id' => 1,
                   'ticketId' => 1,
                   'barcode' => 'EAN-13:111111111',
                  ],
                  [
                   'id' => 2,
                   'ticketId' => 1,
                   'barcode' => 'EAN-13:222222222',
                  ],
                  [
                   'id' => 3,
                   'ticketId' => 2,
                   'barcode' => 'EAN-13:333333333',
                  ],
                  [
                   'id' => 4,
                   'ticketId' => 3,
                   'barcode' => 'EAN-13:444444444',
                  ],
                  [
                   'id' => 5,
                   'ticketId' => 4,
                   'barcode' => 'EAN-13:555555555',
                  ],
                  [
                   'id' => 6,
                   'ticketId' => 5,
                   'barcode' => 'EAN-13:666666666',
                  ],
                  [
                   'id' => 7,
                   'ticketId' => 5,
                   'barcode' => 'EAN-13:777777777',
                  ],
                  [
                   'id' => 8,
                   'ticketId' => 6,
                   'barcode' => 'EAN-13:888888888',
                  ],
                  [
                   'id' => 9,
                   'ticketId' => 7,
                   'barcode' => 'EAN-13:888888888',
                  ],
              ]);
            }
}
