<?php

use Orchestra\Testbench\TestCase;
use Gegosoft\Dogecoin\Traits\Dogecoind;
use Gegosoft\Dogecoin\Client as DogecoinClient;

class DogecoindTest extends TestCase
{
    use Dogecoind;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Gegosoft\Dogecoin\Providers\ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Dogecoind' => 'Gegosoft\Dogecoin\Facades\Dogecoind',
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('dogecoind.user', 'testuser');
        $app['config']->set('dogecoind.password', 'testpass');
    }

    /**
     * Test service provider.
     *
     * @return void
     */
    public function testServiceIsAvailable()
    {
        $this->assertTrue($this->app->bound('dogecoind'));
    }

    /**
     * Test facade.
     *
     * @return void
     */
    public function testFacade()
    {
        $this->assertInstanceOf(DogecoinClient::class, \Dogecoind::getFacadeRoot());
    }

    /**
     * Test helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $this->assertInstanceOf(DogecoinClient::class, dogecoind());
    }

    /**
     * Test trait.
     *
     * @return void
     */
    public function testTrait()
    {
        $this->assertInstanceOf(DogecoinClient::class, $this->dogecoind());
    }

    /**
     * Test dogecoin config.
     *
     * @return void
     */
    public function testConfig()
    {
        $config = dogecoind()->getConfig();

        $this->assertEquals(
            config('dogecoind.scheme'),
            $config['base_uri']->getScheme()
        );

        $this->assertEquals(
            config('dogecoind.host'),
            $config['base_uri']->getHost()
        );

        $this->assertEquals(
            config('dogecoind.port'),
            $config['base_uri']->getPort()
        );

        $this->assertEquals(config('dogecoind.user'), $config['auth'][0]);
        $this->assertEquals(config('dogecoind.password'), $config['auth'][1]);
    }
}
